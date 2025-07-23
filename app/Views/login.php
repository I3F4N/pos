<?php
// This is the login view file for OSPOS. It renders a simple login form using Bootstrap for styling.
// We've fixed syntax issues, added proper HTML structure, and included basic custom styles for better appearance.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('Common.software_title') . ' ' . lang('Common.logo') ?></title>
    <!-- Link to Bootstrap CSS (fixed path using CodeIgniter's base_url() to avoid loading issues) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    
    <!-- Custom styles: Added here to fix plain defaults. These center the form, style errors, and add button effects. -->
    <!-- If you have an external custom.css, link it like: <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>"> -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for better contrast */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height for centering */
            margin: 0;
        }
        .login-form {
            max-width: 400px; /* Limit form width for better mobile view */
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        .alert-danger {
            margin-bottom: 20px; /* Add spacing below errors */
            padding: 10px; /* Custom padding for error boxes */
        }
        .btn-primary {
            width: 100%; /* Full-width button for touch-friendliness */
            transition: background-color 0.3s; /* Smooth hover effect */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover (custom override) */
        }
        @media (max-width: 576px) { /* Responsive tweak for small screens */
            .login-form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Main login form container -->
    <div class="login-form">
        <h1 class="text-center"><?= lang('Login.welcome', [lang('Common.software_short')]) ?></h1>
        
        <!-- Display any errors (styled with custom padding) -->
        <?php if ($this->session->flashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach ($this->session->flashdata('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Migration needed message (if applicable) -->
        <?php if (isset($latest_version)): ?>
            <div class="alert alert-warning">
                <?= lang('Login.migration_needed', [$latest_version]) ?>
            </div>
        <?php endif; ?>
        
        <!-- The login form, using CodeIgniter's form_open() for CSRF protection -->
        <?= form_open('login', ['id' => 'login_form', 'class' => 'form-horizontal']); ?>
        
        <div class="form-group">
            <label for="username"><?= lang('Login.username') ?></label>
            <div class="input-group">
                <span class="input-group-addon"><?= lang('Common.icon') . ' ' . lang('Login.username') ?></span>
                <input type="text" name="username" id="username" class="form-control" required aria-label="Username">
            </div>
        </div>
        
        <div class="form-group">
            <label for="password"><?= lang('Login.password') ?></label>
            <div class="input-group">
                <span class="input-group-addon"><?= lang('Common.icon') . ' ' . lang('Login.password') ?></span>
                <input type="password" name="password" id="password" class="form-control" required aria-label="Password">
            </div>
        </div>
        
        <!-- Any additional messages or links -->
        <?php if (isset($some_condition)): ?> <!-- Replace with actual condition if needed -->
            <p>Some additional info here.</p>
        <?php endif; ?>
        
        <button type="submit" class="btn btn-primary"><?= lang('Login.go') ?></button>
        
        <?= form_close(); ?>
    </div>
</body>
</html>
