@extends("comman.layout")


@section("title")
    Add Patient
@endsection

@section("content")
    <div class="ui container">

        <div class="ui hidden divider"></div>

        <div class="ui blue inverted segment ">
            <div class="ui small center aligned header">
                Add New Doctor
            </div>

        </div>

        @if(session()->has('message'))
            <div class="ui green massive message">{{ session()->get('message') }}</div>
        @endif

        <div class="ui grid">
            <div class="eight wide column">

                    <form class="ui form" action="/adddoctor" method="post">
                        <div class="ui teal blue inverted segment">

                        <div class="field">
                            <label>Doctor Name</label>
                            <input type="text" name="Name" placeholder="Name">
                        </div>
                        <div class="field">
                            <label>email</label>
                            <input type="text" name="email" placeholder="email">
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="field">
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="phone">
                        </div>
                        <div class="field">
                            <label>Hospital</label>
                            <input disabled name="hospitalName" value="{{$_SESSION["HOSPITAL_NAME"]}}" type="text">
                        </div>
                        </div>
                        <button class="ui button blue leaf" type="submit">save</button>
                        <div class="ui error message"></div>

                    </form>

            </div>

            <div class="eight wide column ">
                <div class="ui teal segment">

                    @foreach($Doctors as $doctor)
                        <div class="ui segment">
                            <a href="/delete?id={{$doctor->ID}}" class="ui red button">
                                delete
                            </a>
                            <div class="ui blue label">{{$doctor->Name}}</div>

                        </div>

                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <script>
        $('.green.leaf')

            .transition({
                animation: 'scale',
                duration: '0s'

            })
            .transition({
                animation: 'scale',
                duration: '2s'

            })
        ;


        $(".ui.dropdown").dropdown();

        $('.ui.form')
            .form({
                fields: {
                    password: {
                        identifier: 'password',
                        rules: [

                            {
                                type: 'minLength[6]',
                                prompt: 'Your password must be at least 6 characters'
                            }
                        ]
                    },
                    phone: {
                        identifier: 'phone',
                        rules: [
                            {
                                type: 'empty'

                            }
                        ]
                    },
                    Name: {
                        identifier: 'Name',
                        rules: [

                            {
                                type: 'minLength[6]',
                                prompt: 'Your Name must be at least 6 characters'
                            }
                        ]
                    },
                    hospitalDropdown: {
                        identifier: 'hospitalDropdown',
                        rules: [
                            {
                                type: 'empty'

                            }
                        ]
                    },
                    email: {
                        identifier: 'email',
                        rules: [

                            {
                                type: 'email',
                                prompt: 'Your email must be true'
                            }
                        ]
                    }
                }
            })
        ;
    </script>
@endsection