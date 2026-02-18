<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Sweet Treats Dental Clinic</title>
    <meta name="description" content="Buat reservasi perawatan gigi di Sweet Treats Dental Clinic.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #3a2a1a;
            background: linear-gradient(165deg, #fffaf5 0%, #fef0e2 50%, #fce8d4 100%);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 780px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255, 250, 245, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(70, 21, 0, 0.08);
            padding: 0 24px;
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand span {
            background: linear-gradient(135deg, #461500, #8b3a00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #461500, #8b3a00);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: transparent;
            border: 2px solid #461500;
            color: #461500;
            border-radius: 50px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #461500;
            color: #fff;
        }

        /* ===== FORM ===== */
        .form-section {
            padding: 48px 0 80px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header .tag {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(70, 21, 0, 0.06);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #461500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }

        .form-header h1 {
            font-size: 2.2rem;
            font-weight: 900;
            color: #461500;
            margin-bottom: 12px;
        }

        .form-header p {
            font-size: 1rem;
            color: #6b4a30;
            line-height: 1.6;
        }

        .form-card {
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(70, 21, 0, 0.08);
            border: 1px solid rgba(70, 21, 0, 0.04);
        }

        /* Step indicators */
        .steps {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 36px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #8b7a6b;
            background: #f5f0eb;
            transition: all 0.4s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #461500, #6b2400);
            color: #fff;
        }

        .step.done {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .step-num {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        .step.active .step-num {
            background: rgba(255, 255, 255, 0.2);
        }

        .step.done .step-num {
            background: #2e7d32;
            color: #fff;
        }

        /* Alerts */
        .alert-success {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            border: 1px solid #a5d6a7;
            border-radius: 16px;
            padding: 20px 24px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: #2e7d32;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .alert-success i {
            font-size: 1.3rem;
        }

        .alert-error {
            background: linear-gradient(135deg, #ffebee, #ffcdd2);
            border: 1px solid #ef9a9a;
            border-radius: 16px;
            padding: 16px 24px;
            margin-bottom: 28px;
            color: #c62828;
            font-size: 0.9rem;
        }

        .alert-error ul {
            margin: 8px 0 0 16px;
        }

        /* Form controls */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #461500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group label .required {
            color: #c45200;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            background: #fffaf5;
            border: 2px solid rgba(70, 21, 0, 0.1);
            border-radius: 14px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            color: #3a2a1a;
            transition: all 0.3s;
            outline: none;
        }

        .form-control:focus {
            border-color: #461500;
            box-shadow: 0 0 0 4px rgba(70, 21, 0, 0.08);
        }

        .form-control.is-invalid {
            border-color: #c62828;
        }

        .invalid-feedback {
            font-size: 0.8rem;
            color: #c62828;
            margin-top: 6px;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23461500' viewBox='0 0 16 16'%3E%3Cpath d='M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            padding-right: 44px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Hidden sections */
        .chain-section {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .chain-section.visible {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Date pills */
        .date-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .date-pill {
            padding: 12px 18px;
            border: 2px solid rgba(70, 21, 0, 0.1);
            border-radius: 14px;
            background: #fffaf5;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            min-width: 120px;
        }

        .date-pill:hover {
            border-color: #461500;
            background: rgba(70, 21, 0, 0.03);
        }

        .date-pill.selected {
            border-color: #461500;
            background: linear-gradient(135deg, #461500, #6b2400);
            color: #fff;
        }

        .date-pill .date-day {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            opacity: 0.7;
        }

        .date-pill .date-num {
            font-size: 1rem;
            font-weight: 800;
        }

        .date-pill.selected .date-day,
        .date-pill.selected .date-num {
            color: #fff;
            opacity: 1;
        }

        /* Time slots - JADWAL */
        .schedule-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: #461500;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .slots-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }

        .slot {
            position: relative;
            padding: 14px 8px;
            border: 2px solid rgba(70, 21, 0, 0.1);
            border-radius: 12px;
            background: #fffaf5;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
            font-weight: 700;
            color: #461500;
        }

        .slot:hover:not(.booked):not(.past) {
            border-color: #461500;
            background: rgba(70, 21, 0, 0.03);
            transform: translateY(-2px);
        }

        .slot.selected {
            border-color: #461500;
            background: linear-gradient(135deg, #461500, #6b2400);
            color: #fff;
        }

        .slot.booked {
            background: #f5f0eb;
            color: #b0a090;
            cursor: not-allowed;
            border-color: rgba(70, 21, 0, 0.06);
            position: relative;
        }

        .slot.booked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            right: 10%;
            height: 2px;
            background: #c0b0a0;
            transform: rotate(-12deg);
        }

        .slot.past {
            background: #fafafa;
            color: #ccc;
            cursor: not-allowed;
            border-color: #eee;
        }

        .slot .slot-status {
            font-size: 0.65rem;
            font-weight: 600;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .slot.booked .slot-status {
            color: #c45200;
        }

        .slot.selected .slot-status {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Services checkboxes */
        .services-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .service-checkbox {
            position: relative;
        }

        .service-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .service-checkbox label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            background: #fffaf5;
            border: 2px solid rgba(70, 21, 0, 0.08);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: none;
            letter-spacing: 0;
            font-size: 0.85rem;
            font-weight: 600;
            color: #5a3a20;
        }

        .service-checkbox label .check-icon {
            width: 22px;
            height: 22px;
            border: 2px solid rgba(70, 21, 0, 0.15);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            flex-shrink: 0;
            font-size: 0.7rem;
            color: transparent;
        }

        .service-checkbox input:checked+label {
            border-color: #461500;
            background: rgba(70, 21, 0, 0.04);
        }

        .service-checkbox input:checked+label .check-icon {
            background: #461500;
            border-color: #461500;
            color: #fff;
        }

        .service-checkbox label:hover {
            border-color: rgba(70, 21, 0, 0.2);
        }

        .service-info {
            flex: 1;
        }

        .service-name {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #461500;
        }

        .service-meta {
            display: flex;
            gap: 10px;
            margin-top: 4px;
            font-size: 0.72rem;
            color: #8b7a6b;
        }

        .service-meta .price {
            color: #c45200;
            font-weight: 700;
        }

        /* Duration summary */
        .duration-summary {
            background: linear-gradient(135deg, #fef5ed, #fef0e2);
            border: 1px solid rgba(70, 21, 0, 0.08);
            border-radius: 14px;
            padding: 16px 20px;
            margin-top: 16px;
            display: none;
        }

        .duration-summary.visible {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .duration-summary .summary-item {
            text-align: center;
        }

        .duration-summary .summary-label {
            font-size: 0.7rem;
            font-weight: 600;
            color: #8b7a6b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .duration-summary .summary-value {
            font-size: 1.1rem;
            font-weight: 800;
            color: #461500;
            margin-top: 2px;
        }

        .duration-summary .summary-value.price {
            color: #c45200;
        }

        /* Submit */
        .btn-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #461500, #6b2400);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 12px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(70, 21, 0, 0.35);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .form-note {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8rem;
            color: #8b7a6b;
        }

        /* Loading spinner */
        .loading {
            text-align: center;
            padding: 24px;
            color: #8b7a6b;
            font-size: 0.9rem;
        }

        .loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .empty-state {
            text-align: center;
            padding: 24px;
            color: #8b7a6b;
            font-size: 0.9rem;
        }

        .empty-state i {
            font-size: 2rem;
            margin-bottom: 8px;
            display: block;
            color: #c0b0a0;
        }

        /* Preview Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            background: #fff;
            border-radius: 24px;
            max-width: 560px;
            width: 100%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.2);
            animation: modalIn 0.3s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(10px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-header {
            padding: 28px 32px 0;
            text-align: center;
        }

        .modal-header .modal-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #fef5ed, #fef0e2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #461500;
            margin: 0 auto 16px;
        }

        .modal-header h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #461500;
        }

        .modal-header p {
            font-size: 0.85rem;
            color: #8b7a6b;
            margin-top: 4px;
        }

        .modal-body {
            padding: 24px 32px;
        }

        .preview-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(70, 21, 0, 0.06);
            font-size: 0.9rem;
        }

        .preview-row:last-child {
            border-bottom: none;
        }

        .preview-row .preview-label {
            color: #8b7a6b;
            font-weight: 600;
        }

        .preview-row .preview-value {
            color: #461500;
            font-weight: 700;
            text-align: right;
            max-width: 60%;
        }

        .preview-services {
            margin-top: 8px;
        }

        .preview-services .svc-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 12px;
            background: #fffaf5;
            border-radius: 10px;
            margin-bottom: 6px;
            font-size: 0.85rem;
        }

        .preview-services .svc-item .svc-name {
            font-weight: 600;
            color: #461500;
        }

        .preview-services .svc-item .svc-detail {
            color: #8b7a6b;
            font-size: 0.75rem;
        }

        .preview-total {
            display: flex;
            justify-content: space-between;
            padding: 16px 0 0;
            margin-top: 8px;
            border-top: 2px solid rgba(70, 21, 0, 0.1);
            font-size: 1rem;
            font-weight: 800;
        }

        .preview-total .total-price {
            color: #c45200;
        }

        .modal-footer {
            padding: 0 32px 28px;
            display: flex;
            gap: 12px;
        }

        .btn-modal {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 14px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .btn-modal.cancel {
            background: #f5f0eb;
            color: #5a3a20;
        }

        .btn-modal.cancel:hover {
            background: #e8e0d8;
        }

        .btn-modal.confirm {
            background: linear-gradient(135deg, #461500, #6b2400);
            color: #fff;
        }

        .btn-modal.confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(70, 21, 0, 0.3);
        }

        /* Riwayat link */
        .riwayat-link {
            text-align: center;
            margin-top: 16px;
        }

        .riwayat-link a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #461500;
            padding: 8px 16px;
            border-radius: 50px;
            border: 1.5px solid rgba(70, 21, 0, 0.15);
            transition: all 0.3s;
        }

        .riwayat-link a:hover {
            background: rgba(70, 21, 0, 0.04);
            border-color: #461500;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .form-card {
                padding: 28px 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .steps {
                flex-wrap: wrap;
            }

            .step span {
                display: none;
            }

            .slots-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .date-pill {
                min-width: 95px;
                padding: 10px 12px;
            }

            .modal-body,
            .modal-header,
            .modal-footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="navbar-brand">
                <div class="brand-icon"><i class="fa-solid fa-tooth"></i></div>
                <span>Sweet Treats</span>
            </a>
            <a href="{{ route('home') }}" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- FORM -->
    <section class="form-section">
        <div class="container">

            <div class="form-header">
                <div class="tag"><i class="fa-solid fa-calendar-check"></i> Reservasi Online</div>
                <h1>Buat Reservasi</h1>
                <p>Pilih cabang, dokter, jadwal, dan perawatan yang kamu inginkan</p>
            </div>

            <div class="form-card">

                <!-- Step Indicators -->
                <div class="steps">
                    <div class="step active" data-step="1">
                        <span class="step-num">1</span>
                        <span>Cabang</span>
                    </div>
                    <div class="step" data-step="2">
                        <span class="step-num">2</span>
                        <span>Dokter</span>
                    </div>
                    <div class="step" data-step="3">
                        <span class="step-num">3</span>
                        <span>Jadwal</span>
                    </div>
                    <div class="step" data-step="4">
                        <span class="step-num">4</span>
                        <span>Perawatan</span>
                    </div>
                    <div class="step" data-step="5">
                        <span class="step-num">5</span>
                        <span>Data Diri</span>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert-success">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <strong><i class="fa-solid fa-circle-exclamation"></i> Mohon periksa data berikut:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('landing.reservation.store') }}" id="reservationForm">
                    @csrf

                    <!-- STEP 1: Branch -->
                    <div class="form-group">
                        <label>Pilih Cabang <span class="required">*</span></label>
                        <select name="raw_branch_id" id="branchSelect" class="form-control" required>
                            <option value="">-- Pilih Cabang --</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- STEP 2: Doctor (chain from Branch) -->
                    <div class="chain-section" id="doctorSection">
                        <div class="form-group">
                            <label>Pilih Dokter <span class="required">*</span></label>
                            <select name="raw_doctor_id" id="doctorSelect" class="form-control" required>
                                <option value="">-- Pilih Dokter --</option>
                            </select>
                        </div>
                    </div>

                    <!-- STEP 3: Date (chain from Doctor) -->
                    <div class="chain-section" id="dateSection">
                        <div class="form-group">
                            <label>Pilih Tanggal <span class="required">*</span></label>
                            <div id="dateGrid" class="date-grid"></div>
                            <input type="hidden" name="reservation_date" id="reservationDate">
                        </div>
                    </div>

                    <!-- STEP 3b: Time Slots (chain from Date) -->
                    <div class="chain-section" id="slotSection">
                        <div class="form-group">
                            <label>Jadwal <span class="required">*</span></label>
                            <div id="slotsGrid" class="slots-grid"></div>
                            <input type="hidden" name="reservation_time" id="reservationTime">
                        </div>
                    </div>

                    <!-- STEP 4: Services -->
                    <div class="chain-section" id="serviceSection">
                        <div class="form-group">
                            <label>Perawatan yang Diinginkan <span class="required">*</span></label>
                            <div id="servicesGrid" class="services-grid"></div>
                        </div>
                        <div class="duration-summary" id="durationSummary">
                            <div class="summary-item">
                                <div class="summary-label">Total Durasi</div>
                                <div class="summary-value" id="totalDuration">0 menit</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Total Biaya</div>
                                <div class="summary-value price" id="totalPrice">Rp 0</div>
                            </div>
                            <div class="summary-item">
                                <div class="summary-label">Selesai Pukul</div>
                                <div class="summary-value" id="endTime">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 5: Customer Info -->
                    <div class="chain-section" id="customerSection" style="margin-top:24px">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="required">*</span></label>
                                <input type="text" name="name" id="nameInput" class="form-control"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>No. WhatsApp <span class="required">*</span></label>
                                <input type="text" name="phone" id="phoneInput" class="form-control"
                                    placeholder="08xxxxxxxxxx" required>
                            </div>
                        </div>

                        <button type="button" class="btn-submit" id="previewBtn" disabled onclick="showPreview()">
                            <i class="fa-solid fa-eye"></i> Preview Reservasi
                        </button>

                        <p class="form-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            Tim kami akan menghubungi kamu untuk konfirmasi jadwal via WhatsApp
                        </p>

                        <div class="riwayat-link">
                            <a href="/reservasi/riwayat">
                                <i class="fa-solid fa-clock-rotate-left"></i> Lihat Riwayat Reservasi
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- PREVIEW MODAL -->
    <div class="modal-overlay" id="previewModal">
        <div class="modal-box">
            <div class="modal-header">
                <div class="modal-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                <h2>Konfirmasi Reservasi</h2>
                <p>Pastikan data di bawah ini sudah benar</p>
            </div>
            <div class="modal-body" id="previewBody"></div>
            <div class="modal-footer">
                <button class="btn-modal cancel" onclick="closePreview()">Kembali</button>
                <button class="btn-modal confirm" onclick="confirmSubmit()">
                    <i class="fa-solid fa-check"></i> Kirim Reservasi
                </button>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            const BASE = '/api/reservation';
            let selectedDate = null;
            let selectedTime = null;
            let selectedDateLabel = '';
            let servicesData = [];

            // ─── Cookie helpers ───
            function setCookie(name, value, days) {
                const d = new Date();
                d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + encodeURIComponent(value) + ';expires=' + d.toUTCString() +
                    ';path=/';
            }

            function getCookie(name) {
                const v = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
                return v ? decodeURIComponent(v.pop()) : '';
            }

            // ─── Auto-fill from cookie ───
            const savedName = getCookie('st_name');
            const savedPhone = getCookie('st_phone');
            if (savedName) $('#nameInput').val(savedName);
            if (savedPhone) $('#phoneInput').val(savedPhone);

            // ─── Update step indicators ───
            function setStep(num) {
                $('.step').each(function() {
                    const s = parseInt($(this).data('step'));
                    $(this).removeClass('active done');
                    if (s < num) $(this).addClass('done');
                    if (s === num) $(this).addClass('active');
                });
            }

            // ─── Format Rupiah ───
            function formatRp(num) {
                return 'Rp ' + parseInt(num).toLocaleString('id-ID');
            }

            // ─── STEP 1 → 2: Branch changed → load doctors ───
            $('#branchSelect').on('change', function() {
                const branchId = $(this).val();

                // Reset downstream
                $('#doctorSelect').html('<option value="">-- Pilih Dokter --</option>');
                $('#dateGrid').empty();
                $('#slotsGrid').empty();
                $('#servicesGrid').empty();
                $('#durationSummary').removeClass('visible');
                $('#doctorSection, #dateSection, #slotSection, #serviceSection, #customerSection')
                    .removeClass('visible');
                selectedDate = null;
                selectedTime = null;
                $('#reservationDate').val('');
                $('#reservationTime').val('');
                $('#previewBtn').prop('disabled', true);

                if (!branchId) {
                    setStep(1);
                    return;
                }

                $('#doctorSection').addClass('visible');
                $('#doctorSelect').html('<option value="">Memuat dokter...</option>');
                setStep(2);

                $.getJSON(BASE + '/doctors/' + branchId, function(data) {
                    let opts = '<option value="">-- Pilih Dokter --</option>';
                    data.forEach(function(d) {
                        opts += '<option value="' + d.id + '">' + d.name + '</option>';
                    });
                    $('#doctorSelect').html(opts);
                    if (data.length === 0) {
                        $('#doctorSelect').html(
                            '<option value="">Tidak ada dokter tersedia</option>');
                    }
                });
            });

            // ─── STEP 2 → 3: Doctor changed → load dates ───
            $('#doctorSelect').on('change', function() {
                const doctorId = $(this).val();
                const branchId = $('#branchSelect').val();

                $('#dateGrid').empty();
                $('#slotsGrid').empty();
                $('#servicesGrid').empty();
                $('#durationSummary').removeClass('visible');
                $('#dateSection, #slotSection, #serviceSection, #customerSection').removeClass('visible');
                selectedDate = null;
                selectedTime = null;
                $('#reservationDate').val('');
                $('#reservationTime').val('');
                $('#previewBtn').prop('disabled', true);

                if (!doctorId) {
                    setStep(2);
                    return;
                }

                $('#dateSection').addClass('visible');
                $('#dateGrid').html(
                    '<div class="loading"><i class="fa-solid fa-spinner"></i> Memuat jadwal...</div>');
                setStep(3);

                $.getJSON(BASE + '/dates/' + branchId + '/' + doctorId, function(data) {
                    if (data.length === 0) {
                        $('#dateGrid').html(
                            '<div class="empty-state"><i class="fa-regular fa-calendar-xmark"></i>Tidak ada jadwal tersedia dalam 14 hari ke depan</div>'
                        );
                        return;
                    }
                    let html = '';
                    data.forEach(function(d) {
                        const parts = d.label.split(', ');
                        html += '<div class="date-pill" data-date="' + d.date +
                            '" data-day="' + d.day + '" data-label="' + d.label + '">';
                        html += '<div class="date-day">' + parts[0] + '</div>';
                        html += '<div class="date-num">' + parts[1] + '</div>';
                        html += '</div>';
                    });
                    $('#dateGrid').html(html);
                });
            });

            // ─── STEP 3: Date clicked → load time slots ───
            $(document).on('click', '.date-pill', function() {
                const date = $(this).data('date');
                const branchId = $('#branchSelect').val();
                const doctorId = $('#doctorSelect').val();

                $('#slotsGrid').empty();
                $('#servicesGrid').empty();
                $('#durationSummary').removeClass('visible');
                $('#slotSection, #serviceSection, #customerSection').removeClass('visible');
                selectedTime = null;
                $('#reservationTime').val('');
                $('#previewBtn').prop('disabled', true);

                $('.date-pill').removeClass('selected');
                $(this).addClass('selected');
                selectedDate = date;
                selectedDateLabel = $(this).data('label');
                $('#reservationDate').val(date);

                $('#slotSection').addClass('visible');
                $('#slotsGrid').html(
                    '<div class="loading"><i class="fa-solid fa-spinner"></i> Memuat jadwal...</div>');

                $.getJSON(BASE + '/slots/' + branchId + '/' + doctorId + '/' + date, function(data) {
                    if (!data.slots || data.slots.length === 0) {
                        $('#slotsGrid').html(
                            '<div class="empty-state"><i class="fa-regular fa-clock"></i>Tidak ada slot tersedia</div>'
                        );
                        return;
                    }
                    let html = '';
                    data.slots.forEach(function(slot) {
                        let cls = 'slot';
                        let statusText = 'Tersedia';
                        if (slot.is_booked) {
                            cls += ' booked';
                            statusText = 'Terisi';
                        } else if (slot.is_past) {
                            cls += ' past';
                            statusText = 'Lewat';
                        }
                        html += '<div class="' + cls + '" data-time="' + slot.time +
                            '" data-end="' + slot.end_time + '">';
                        html += '<div>' + slot.label + '</div>';
                        html += '<div class="slot-status">' + statusText + '</div>';
                        html += '</div>';
                    });
                    $('#slotsGrid').html(html);
                });
            });

            // ─── STEP 3b → 4: Time slot clicked → load services ───
            $(document).on('click', '.slot:not(.booked):not(.past)', function() {
                $('#servicesGrid').empty();
                $('#durationSummary').removeClass('visible');
                $('#serviceSection, #customerSection').removeClass('visible');
                $('#previewBtn').prop('disabled', true);

                $('.slot').removeClass('selected');
                $(this).addClass('selected');
                selectedTime = $(this).data('time');
                $('#reservationTime').val(selectedTime);

                setStep(4);
                $('#serviceSection').addClass('visible');
                $('#servicesGrid').html(
                    '<div class="loading" style="grid-column:1/-1"><i class="fa-solid fa-spinner"></i> Memuat perawatan...</div>'
                );

                $.getJSON(BASE + '/services', function(data) {
                    servicesData = data;
                    let html = '';
                    data.forEach(function(svc) {
                        html += '<div class="service-checkbox">';
                        html += '<input type="checkbox" name="services[]" value="' + svc
                            .id + '" id="svc_' + svc.id +
                            '" class="service-check" data-duration="' + svc
                            .duration_minutes + '" data-price="' + svc.price +
                            '" data-name="' + svc.name + '">';
                        html += '<label for="svc_' + svc.id + '">';
                        html +=
                            '<span class="check-icon"><i class="fa-solid fa-check"></i></span>';
                        html += '<span class="service-info">';
                        html += '<span class="service-name">' + svc.name + '</span>';
                        html += '<span class="service-meta"><span>' + svc.duration_minutes +
                            ' menit</span> <span class="price">' + formatRp(svc.price) +
                            '</span></span>';
                        html += '</span>';
                        html += '</label>';
                        html += '</div>';
                    });
                    $('#servicesGrid').html(html);
                });
            });

            // ─── Service checkbox changed → update summary ───
            $(document).on('change', '.service-check', function() {
                let totalDuration = 0;
                let totalPrice = 0;
                let count = 0;

                $('.service-check:checked').each(function() {
                    totalDuration += parseInt($(this).data('duration'));
                    totalPrice += parseInt($(this).data('price'));
                    count++;
                });

                if (count > 0) {
                    $('#durationSummary').addClass('visible');
                    $('#totalDuration').text(totalDuration + ' menit');
                    $('#totalPrice').text(formatRp(totalPrice));

                    if (selectedTime) {
                        const parts = selectedTime.split(':');
                        const startMin = parseInt(parts[0]) * 60 + parseInt(parts[1]);
                        const endMin = startMin + totalDuration;
                        const endH = String(Math.floor(endMin / 60)).padStart(2, '0');
                        const endM = String(endMin % 60).padStart(2, '0');
                        $('#endTime').text(endH + ':' + endM);
                    }

                    $('#customerSection').addClass('visible');
                    setStep(5);
                    checkSubmit();
                } else {
                    $('#durationSummary').removeClass('visible');
                    $('#customerSection').removeClass('visible');
                    $('#previewBtn').prop('disabled', true);
                    setStep(4);
                }
            });

            // ─── Check if preview button can be enabled ───
            window.checkSubmit = function() {
                const hasServices = $('.service-check:checked').length > 0;
                const hasName = $('#nameInput').val().trim() !== '';
                const hasPhone = $('#phoneInput').val().trim() !== '';
                const hasTime = $('#reservationTime').val() !== '';
                const hasDate = $('#reservationDate').val() !== '';
                const hasBranch = $('#branchSelect').val() !== '';
                const hasDoctor = $('#doctorSelect').val() !== '';

                $('#previewBtn').prop('disabled', !(hasServices && hasName && hasPhone && hasTime && hasDate &&
                    hasBranch && hasDoctor));
            };

            $('#nameInput, #phoneInput').on('input', function() {
                checkSubmit();
            });
        });

        // ─── PREVIEW MODAL ───
        function showPreview() {
            const branchText = $('#branchSelect option:selected').text();
            const doctorText = $('#doctorSelect option:selected').text();
            const dateText = $('.date-pill.selected').data('label') || $('#reservationDate').val();
            const timeText = $('#reservationTime').val();
            const name = $('#nameInput').val();
            const phone = $('#phoneInput').val();

            function formatRp(num) {
                return 'Rp ' + parseInt(num).toLocaleString('id-ID');
            }

            // Gather services
            let svcHtml = '';
            let totalPrice = 0;
            let totalDuration = 0;
            $('.service-check:checked').each(function() {
                const n = $(this).data('name');
                const d = parseInt($(this).data('duration'));
                const p = parseInt($(this).data('price'));
                totalDuration += d;
                totalPrice += p;
                svcHtml += '<div class="svc-item"><div><span class="svc-name">' + n +
                    '</span><br><span class="svc-detail">' + d + ' menit</span></div><div class="svc-detail">' +
                    formatRp(p) + '</div></div>';
            });

            // End time
            const parts = timeText.split(':');
            const endMin = parseInt(parts[0]) * 60 + parseInt(parts[1]) + totalDuration;
            const endH = String(Math.floor(endMin / 60)).padStart(2, '0');
            const endM = String(endMin % 60).padStart(2, '0');

            let html = '';
            html += '<div class="preview-row"><span class="preview-label">Nama</span><span class="preview-value">' + name +
                '</span></div>';
            html += '<div class="preview-row"><span class="preview-label">WhatsApp</span><span class="preview-value">' +
                phone + '</span></div>';
            html += '<div class="preview-row"><span class="preview-label">Cabang</span><span class="preview-value">' +
                branchText + '</span></div>';
            html += '<div class="preview-row"><span class="preview-label">Dokter</span><span class="preview-value">' +
                doctorText + '</span></div>';
            html += '<div class="preview-row"><span class="preview-label">Tanggal</span><span class="preview-value">' +
                dateText + '</span></div>';
            html += '<div class="preview-row"><span class="preview-label">Jam</span><span class="preview-value">' +
                timeText + ' — ' + endH + ':' + endM + '</span></div>';
            html +=
                '<div style="margin-top:16px"><div class="preview-label" style="margin-bottom:8px;font-size:0.85rem;font-weight:700;color:#8b7a6b">Perawatan</div>';
            html += '<div class="preview-services">' + svcHtml + '</div>';
            html += '<div class="preview-total"><span>Total</span><span class="total-price">' + formatRp(totalPrice) +
                ' (' + totalDuration + ' menit)</span></div>';
            html += '</div>';

            $('#previewBody').html(html);
            $('#previewModal').addClass('show');
        }

        function closePreview() {
            $('#previewModal').removeClass('show');
        }

        function confirmSubmit() {
            // Save to cookie (30 days)
            const name = $('#nameInput').val();
            const phone = $('#phoneInput').val();

            function setCookie(n, v, d) {
                const dt = new Date();
                dt.setTime(dt.getTime() + (d * 24 * 60 * 60 * 1000));
                document.cookie = n + '=' + encodeURIComponent(v) + ';expires=' + dt.toUTCString() + ';path=/';
            }
            setCookie('st_name', name, 30);
            setCookie('st_phone', phone, 30);

            // Submit form
            $('#reservationForm').submit();
        }

        // Close modal on overlay click
        $(document).on('click', '.modal-overlay', function(e) {
            if (e.target === this) closePreview();
        });
    </script>
</body>

</html>
