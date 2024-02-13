<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .right_part {
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .breadcrumb {
            background-color: #f2f2f2;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .alert {
            padding: 10px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .box-footer {
            margin-top: 20px;
        }

        .submit_btn {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit_btn:hover {
            background-color: #0056b3;
        }

        .btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="right_part">
        <div class="d-flex gap-3 justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <div class="breadcrumb">
                    <div class="breadcrumb-item">User</div>
                    <div class="breadcrumb-item active" aria-current="page">User Create</div>
                </div>
            </nav>
        </div>
        
        <!-- Success or Error Messages -->
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('msg') }}
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('error') }}
        </div>
        @endif

        <!-- Form Section -->
        <section class="folder_sec p-0">
            <form method="POST" action="{{ route('user-management.store') }}">
                @csrf

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <!-- Add more form fields as needed -->

                <!-- Form Submission Buttons -->
                <div class="box-footer">
                    <button type="submit" class="submit_btn">Submit</button>
                    <button class="btn submit_btn disabled" type="button" id="process_btn" style="display:none">
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Processing
                    </button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
