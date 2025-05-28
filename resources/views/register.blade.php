<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Registet</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background: #e9ecef;
                display: flex
                justify-content: center;
                align-items: center;
                height: 100vh
            }

            from{
                background: white
                pandding: 2rem;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                with: 350px;
            }

            h2{
                text-align: center;
                margin-bottom: 1rem;
            }

            input, select{
                width: 100%;
                padding: 10px;
                margin-bottom: 1rem;
                border:1px solid #ccc;
                border-radius: 5px;
            }

            button{
                width: 100%;
                padding: 10px;
                background: #007bff;
                color: white
                border: none;
                font-weight: bold;
                border-radius: 5px;
                cursor: pointer;
            }


            button:hover{
                background: #0056b3;
            }
            </style>
    </head>
    <body>
        <form action="{{route('register.submit')}}" method="post">
            <h2>Register</h2>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="surname" placeholder="Surname" required>
            <input type="date" name="date_of_birth" required>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <input type="tel" name="mobile_number" placeholder="Mobile Number" required>
            <input type="pasword" name="password" placeholder="Password" required>
            <input type="pasword" name="password_confirmation" placeholder="Confirm Password" required>
            <input type="submit">Sign Up</button>
        </form>
    </body>
</html>
