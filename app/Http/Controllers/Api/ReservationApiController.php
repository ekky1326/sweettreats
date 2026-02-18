<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RawBranch;
use App\Models\RawDoctor;
use App\Models\RawDoctorSchedule;
use App\Models\RawCusReservation;
use App\Models\RawDocService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationApiController extends Controller
{
  /**
   * Get doctors available at a specific branch (who have schedules there)
   */
  public function getDoctorsByBranch($branchId)
  {
    $doctorIds = RawDoctorSchedule::where('raw_branch_id', $branchId)
      ->distinct()
      ->pluck('raw_doctor_id');

    $doctors = RawDoctor::whereIn('id', $doctorIds)
      ->orderBy('name')
      ->get(['id', 'name']);

    return response()->json($doctors);
  }

  /**
   * Get available dates for a doctor at a specific branch (next 14 days)
   */
  public function getAvailableDates($branchId, $doctorId)
  {
    // Get the schedule days for this doctor at this branch
    $scheduleDays = RawDoctorSchedule::where('raw_branch_id', $branchId)
      ->where('raw_doctor_id', $doctorId)
      ->pluck('day')
      ->unique()
      ->toArray();

    // Day mapping: 1=Monday ... 7=Sunday (Carbon uses 1=Monday, 7=Sunday)
    $dates = [];
    $dayNames = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu'];

    for ($i = 0; $i < 14; $i++) {
      $date = Carbon::today()->addDays($i);
      $dayOfWeek = $date->dayOfWeekIso; // 1=Monday ... 7=Sunday

      if (in_array($dayOfWeek, $scheduleDays)) {
        $dates[] = [
          'date' => $date->format('Y-m-d'),
          'label' => $dayNames[$dayOfWeek] . ', ' . $date->format('d M Y'),
          'day' => $dayOfWeek,
        ];
      }
    }

    return response()->json($dates);
  }

  /**
   * Get time slots for a doctor at a branch on a specific date
   */
  public function getTimeSlots($branchId, $doctorId, $date)
  {
    $carbonDate = Carbon::parse($date);
    $dayOfWeek = $carbonDate->dayOfWeekIso;

    // Get schedules for this day
    $schedules = RawDoctorSchedule::where('raw_branch_id', $branchId)
      ->where('raw_doctor_id', $doctorId)
      ->where('day', $dayOfWeek)
      ->orderBy('start_hour')
      ->get();

    if ($schedules->isEmpty()) {
      return response()->json([]);
    }

    // Get minimum service duration for slot interval (default 30 min)
    $minDuration = RawDocService::min('duration_minutes');
    $slotInterval = max(30, $minDuration ?: 30);

    // Get existing reservations for this doctor on this date
    $reservations = RawCusReservation::where('raw_doctor_id', $doctorId)
      ->where('date', $date)
      ->whereNotNull('start_hour')
      ->whereNotNull('end_hour')
      ->get();

    // Build booked time ranges
    $bookedRanges = [];
    foreach ($reservations as $reservation) {
      $bookedRanges[] = [
        'start' => Carbon::parse($reservation->start_hour)->format('H:i'),
        'end' => Carbon::parse($reservation->end_hour)->format('H:i'),
      ];
    }

    // Generate time slots
    $slots = [];
    foreach ($schedules as $schedule) {
      $start = Carbon::parse($schedule->start_hour);
      $end = Carbon::parse($schedule->end_hour);

      while ($start->copy()->addMinutes($slotInterval)->lte($end)) {
        $slotStart = $start->format('H:i');
        $slotEnd = $start->copy()->addMinutes($slotInterval)->format('H:i');

        // Check if this slot is booked
        $isBooked = false;
        foreach ($bookedRanges as $range) {
          // Slot overlaps with booked range if slot_start < booked_end AND slot_end > booked_start
          if ($slotStart < $range['end'] && $slotEnd > $range['start']) {
            $isBooked = true;
            break;
          }
        }

        // Check if slot is in the past (for today)
        $isPast = false;
        if ($carbonDate->isToday() && Carbon::now()->format('H:i') > $slotStart) {
          $isPast = true;
        }

        $slots[] = [
          'time' => $slotStart,
          'end_time' => $slotEnd,
          'label' => $slotStart,
          'is_booked' => $isBooked,
          'is_past' => $isPast,
          'available' => !$isBooked && !$isPast,
        ];

        $start->addMinutes($slotInterval);
      }
    }

    return response()->json([
      'slots' => $slots,
      'slot_interval' => $slotInterval,
    ]);
  }

  /**
   * Get services list
   */
  public function getServices()
  {
    $services = RawDocService::orderBy('name')->get(['id', 'name', 'duration_minutes', 'price']);
    return response()->json($services);
  }
}
