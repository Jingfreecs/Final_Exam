@extends('layout.guest-layout')

@section('title', 'Register - NE Exchange Rate')

@section('link', 'Sign in')

@section('main-content')
    <div class="col-11 col-sm-5 co-md-6 col-lg-4 mx-auto">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center fs-5 mb-4">Sign up to <strong>NE Exchange Rate</strong></h2>

                <form id="register-form">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fullname" name="name" placeholder="">
                        <label for="fullname">Fullname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="">
                        <label for="password_confirmation">Re-type password</label>
                    </div>

                    <p class="text-muted text-center">By continuing you agree to our <a href="">Terms</a> and <a
                            href="">Privacy Policy</a>
                    </p>

                    <button type="submit" class="btn text-light w-100"
                        style="background-color: #1abb0f; border-radius: 50px;">
                        Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            handleRegister();
        });

        function handleRegister() {
            $('#register-form').on('submit', async function(e) {
                e.preventDefault();

                // $('input[name="name"], input[name="email"], input[name="password"], input[name="password_confirmation"]').on('input', () =>{
                //     if($(this).val() === ''){
                //         $(this).removeClass('is-invalid');
                //         $(this).find('.invalid-feedback').text('');
                //     }
                // })

                const formData = $(this).serializeArray().reduce((obj, item) => {
                    obj[item.name] = item.value;
                    return obj;
                }, {});

                try {
                    const response = await fetch('/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        body: JSON.stringify(formData)
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message
                        })
                        .then((willdirect) => {
                            if(willdirect.isConfirmed){
                                window.location.href = data.redirect_url;
                            }
                        })
                    } else {
                        if (data.errors) {
                            Object.keys(data.errors).forEach((key) => {
                                const inputs = $(`input[name="${key}"]`);

                                if (inputs.length) {
                                    inputs.addClass('is-invalid');
                                    inputs.next('.invalid-feedback').remove();
                                    inputs.after(
                                        `<div class="invalid-feedback">${data.errors[key][0]}</div>`
                                    );
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ops...',
                                text: data.message
                            })
                        }
                    }
                } catch (error) {
                    console.error("Error: ", error)
                }
            })
        }
    </script>
@endsection
