<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .employee-card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }
        .employee-header {
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            color: white;
            padding: 2rem;
        }
        .profile-img-container {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #f1f1f1;
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .detail-item {
            margin-bottom: 1.5rem;
        }
        .detail-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }
        .detail-value {
            font-size: 1.1rem;
        }
        .status-badge {
            font-size: 0.9rem;
            padding: 0.35rem 0.75rem;
        }
        .back-btn {
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            transform: translateX(-3px);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card employee-card mb-4">
                    <div class="employee-header text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="profile-img-container">
                                @if($employee->photoProfil)
                                    <img src="{{ asset('storage/' . $employee->photoProfil) }}" class="profile-img" alt="Profile Image">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                        <i class="bi bi-person" style="font-size: 4rem; color: #6c757d;"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h2>{{ $employee->prenom }} {{ $employee->nom }}</h2>
                        <h4 class="mb-3">{{ $employee->poste }}</h4>
                        <span class="badge status-badge 
                            @if($employee->statut == 'Actif') bg-success
                            @elseif($employee->statut == 'Inactif') bg-danger
                            @else bg-warning text-dark
                            @endif">
                            {{ $employee->statut }}
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label">Employee ID</div>
                                    <div class="detail-value">{{ $employee->id }}</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Date of Birth</div>
                                    <div class="detail-value">{{ \Carbon\Carbon::parse($employee->dateNaissance)->format('d/m/Y') }}</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">
                                        <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Phone</div>
                                    <div class="detail-value">
                                        <a href="tel:{{ $employee->telephone }}">{{ $employee->telephone }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label">Address</div>
                                    <div class="detail-value">{{ $employee->adresse }}</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Salary</div>
                                    <div class="detail-value">{{ number_format($employee->salaire, 2) }} DA</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Hire Date</div>
                                    <div class="detail-value">{{ \Carbon\Carbon::parse($employee->dateEmbauche)->format('d/m/Y') }}</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Contract Type</div>
                                    <div class="detail-value">{{ $employee->typeContrat }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-primary back-btn">
                                <i class="bi bi-arrow-left me-2"></i> Back to Employees
                            </a>
                            <div>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>