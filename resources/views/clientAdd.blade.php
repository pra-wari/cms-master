@extends('layouts.backend')
@section('title', 'Client')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Client</h1>
                
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/client-details">Client</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/client-add/">Add</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded">
            <div class="block-header bg-primary-dark">
                <h2 class="block-title superadmin-text">Add Client</h2>
            </div>
            @if($msgsucc)
                <span class="succ">{{ $msgsucc }}</span>
            @endif
            <div class="block-content">
                <table class="table">
                <form method="POST" action="/client-add">
                    @csrf
                    <tbody>
                        <tr>
                            <td class="block-title">Company Name</td>
                            <td><input type="text" name="company_name" class="form-control" value="{{old('company_name')}}">
                            @if ($errors->has('company_name'))
                                <span class="error">{{ $errors->first('company_name') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">First Name</td>
                            <td><input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
                            @if ($errors->has('first_name'))
                                <span class="error">{{ $errors->first('first_name') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Last Name</td>
                            <td><input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
                            @if ($errors->has('last_name'))
                                <span class="error">{{ $errors->first('last_name') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Address</td>
                            <td><input type="text" name="address" class="form-control" value="{{old('address')}}">
                            @if ($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Country</td>
                            <td><input type="text" name="country" class="form-control" value="{{old('country')}}">
                            @if ($errors->has('country'))
                                <span class="error">{{ $errors->first('country') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">State</td>
                            <td>
                            <input type="text" name="state" class="form-control" value="{{old('state')}}">
                            @if ($errors->has('state'))
                                <span class="error">{{ $errors->first('state') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">City</td>
                            <td>
                            <input type="text" name="city" class="form-control" value="{{old('city')}}">
                            @if ($errors->has('city'))
                                <span class="error">{{ $errors->first('city') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Postal Code</td>
                            <td>
                            <input type="text" name="postal_code" class="form-control" value="{{old('postal_code')}}">
                            @if ($errors->has('postal_code'))
                                <span class="error">{{ $errors->first('postal_code') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Email ID</td>
                            <td>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Phone</td>
                            <td>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Mobile</td>
                            <td>
                            <input type="number" name="mobile" class="form-control" value="{{old('mobile')}}">
                            @if ($errors->has('mobile'))
                                <span class="error">{{ $errors->first('mobile') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Date</td>
                            <td>
                            <input type="date" name="date" class="form-control" value="{{old('renewal_date')}}">
                            @if ($errors->has('date'))
                                <span class="error">{{ $errors->first('date') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="block-title">Password</td>
                            <td>
                            <input type="password" name="password" class="form-control" value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                            <button class="btn btn-success">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
