<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация/Вход - Coffee Guide</title>
    <style>
        :root {
            --color-error: #dc3545;
            --color-light: #FFFFFF;
            --color-accent: #8B4513;
            --color-gray: #333;
            --gradient: linear-gradient(135deg, #8B4513, #3d2413);
            --dark-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);

        }

            {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.6;
        }

        .register-container {
            background: var(--color-light);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: var(--dark-shadow);
            width: 100%;
            max-width: 450px;
        }

        .register-title {
            color: var(--color-accent);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-gray);
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-accent);
        }

        .form-control.error {
            border-color: var(--color-error);
        }

        .error-message {
            color: var(--color-error);
            font-size: 0.9rem;
            margin-top: 0.25rem;
            display: block;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--color-accent);
            color: var(--color-light);
        }

        .btn-primary:hover {
            background: #D2691E;
            transform: translateY(-2px);
        }

        .register-links {
            text-align: center;
            margin-top: 1.5rem;
        }

        .register-link {
            color: var(--color-accent);
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1 class="register-title">Регистрация</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Имя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') error @enderror"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') error @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') error @enderror" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                <input type="password" id="passwordconfirmation" name="passwordconfirmation" class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

        <div class="register-links">
            <a href="{{ route('login') }}" class="register-link">Уже есть аккаунт? Войти</a>
        </div>
    </div>
</body>

</html>