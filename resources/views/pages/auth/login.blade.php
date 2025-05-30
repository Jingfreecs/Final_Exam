@extends('layout.guest-layout') {{-- Only this one is needed --}}

@section('title', 'Login - NE Exchange Rate')
@section('link', 'Sign up')

@section('main-content')
    <div class="col-11 col-sm-8 col-md-6 col-lg-4">
        <div class="card shadow-lg border-0 rounded-4" style="background-color: rgba(255, 255, 255, 0.9);">
            <div class="card-body p-4">
                <h2 class="card-title text-center mb-3" style="color: #222831;">Welcome to <strong>NE Exchange Rate</strong></h2>
                <p class="card-text text-center text-muted mb-4">Please log in to continue</p>

                <form id="login-form">
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3 border-0 shadow-sm" id="username" name="email"
                            placeholder="Username or email">
                        <label for="username" class="text-secondary">email</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control rounded-3 border-0 shadow-sm" id="password" name="password"
                            placeholder="Password">
                        <label for="password" class="text-secondary">Password</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn rounded-pill btn-lg text-white"
                            style="background-color: #1abb0f;">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
        $(document).ready(() => {
            handleLogin();
        });

        function handleLogin() {
            $('#login-form').on('submit', async function(e) {
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
                    const response = await fetch('/login', {
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
