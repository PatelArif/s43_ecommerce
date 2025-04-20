
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Admin User</title>
</head>
<body>
    <h1>Add New Admin User</h1>

    <form id="adminUserForm">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Create Admin</button>
    </form>

    <div id="responseMessage"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('../assets/js/script.js') }}"></script>
</body>
</html>
