<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            text-align: center;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .buttons {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        .logout {
            margin-top: 20px;
        }
        .logout a {
            text-decoration: none;
            color: #007bff;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #fff;
            border: 1px solid #007bff;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .logout a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Management</h1>
        <div class="buttons">
            <a href="{{ route('user-management.create') }}"><button class="submit_btn">Create</button></a>
            <button>Export</button>
        </div>
        <table id="user-management_list">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['password'] }}</td>
                    <td class="action-icons">
                        <a href="{{ route('user-management.edit', $user['id']) }}"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('user-management.destroy', $user['id']) }}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="logout">
            <a href="/">Logout</a>
        </div>
    </div>
</body>
</html>
