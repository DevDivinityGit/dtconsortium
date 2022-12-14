








<body style="background-color:grey">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       width="550" bgcolor="white" style="border:2px solid black">
    <tbody>
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0"
                   cellspacing="0" class="col-550" width="550">
                <tbody>
                <tr>
                    <td align="center" style="background-color: #4cb96b;
                                           height: 50px;">

                        <a href="#" style="text-decoration: none;">
                            <p style="color:white;
                                                  font-weight:bold;">
                                Your business name
                            </p>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr style="height: 300px;">
        <td align="center" style="border: none;
                           border-bottom: 2px solid #4cb96b;
                           padding-right: 20px;padding-left:20px">

            <p style="font-weight: bolder;font-size: 42px;
                              letter-spacing: 0.025em;
                              color:black;">

                <br>Copy  Reset password code blow
            </p>
            <h3>{{App\VerifyPassword::where('email', request()->email)->first()->code}}</h3>
            {{--<input readonly type="text"  value="{{$_SESSION['current_code']}}">--}}


        </td>
    </tr>