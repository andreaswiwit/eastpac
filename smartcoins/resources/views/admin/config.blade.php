@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        {{ $title }}
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">{{ $title }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div id="msg" class="alert text-center" style="display:none">
                    <strong></strong>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <h3 class="box-title">Edit Config</h3>
                    </div>
                    <div class="box-body box-profile">

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Site Title</b> <a class="pull-right text-site-title" id="site-title-config" onclick="showSiteTitleConfig()">{{ $site_title }}</a>
                            <div class="input-group input-group-sm" id="site-title-config-input" style="display:none">
                                <input type="text" class="form-control" key="site-title" placeholder="Site Title" value="{{ $site_title }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat" id="btnok-title"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-danger btn-flat" id="btncancel-title"><i class="fa fa-times"></i></button>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <b>Theme</b> <a class="pull-right" id="theme-config" onclick="showThemeConfig()">Custom Theme</a>
                            <div class="form-group" id="theme-config-select" style="display:none">
                                <select class="form-control">
                                  <option>option 1</option>
                                  <option>option 2</option>
                                  <option>option 3</option>
                                  <option>option 4</option>
                                  <option>option 5</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success btn-sm" id="btnok-theme">Save</button>
                                <button type="submit" class="btn btn-danger btn-sm" id="btncancel-theme">Cancel</button>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <b>Contact Email</b> <a class="pull-right" id="contact-email-config" onclick="showContactEmailConfig()">{{ $contact_email }}</a>
                            <div class="input-group input-group-sm" id="contact-email-config-input" style="display:none">
                                <input type="email" class="form-control" placeholder="Contact Email" key="contact-email" value="{{ $contact_email }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat" id="btnok-contact-email"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-danger btn-flat" id="btncancel-contact-email"><i class="fa fa-times"></i></button>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <b>Contact Address</b> <a class="pull-right" id="contact-address-config" onclick="showContactAddressConfig()">{{ $contact_address }}</a>
                            <div class="input-group input-group-sm" id="contact-address-config-input" style="display:none">
                                <input type="text" class="form-control" placeholder="Contact Address" key="contact-address" value="{{ $contact_address }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat" id="btnok-contact-address"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-danger btn-flat" id="btncancel-contact-address"><i class="fa fa-times"></i></button>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <b>Contact Phone Number</b> <a class="pull-right" id="contact-phone-number-config" onclick="showContactPhoneNumberConfig()">{{ $contact_phone_number }}</a>
                            <div class="input-group input-group-sm" id="contact-phone-number-config-input" style="display:none">
                                <input type="text" class="form-control" key="contact-phone-number" placeholder="Contact Phone Number" value="{{ $contact_phone_number }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-flat" id="btnok-phone-number"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-danger btn-flat" id="btncancel-phone-number"><i class="fa fa-times"></i></button>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <b>Ethereum address</b> <a class="pull-right" id="ethereum-address-config">26318283772283</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        // $(document).ready(function(){

            // btn site title
            $('#btnok-title').click(function() {
                $.ajax({
                    url: '/administrator/site-config/save-edit-config',
                    type: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        val: $('#site-title-config-input input').val(),
                        key: $('#site-title-config-input input').attr('key')
                    },
                    error: function(datas, status, c) {
                        $('#msg').addClass('alert-danger');
                        $('#msg').removeClass('alert-success');
                        $('#msg strong').text(datas.responseJSON.msg);
                        $('#msg').show();
                    },
                    success: function(datas, status,c) {
                        $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg strong').text(datas.msg);
                        $('#msg').show();
                        $('.text-site-title').text($('#site-title-config-input input').val());
                        $('#site-title-config-input').hide();
                        $('#site-title-config').show();

                    }
                })
            });

            $('#btnok-contact-email').click(function() {
                $.ajax({
                    url: '/administrator/site-config/save-edit-config',
                    type: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        val: $('#contact-email-config-input input').val(),
                        key: $('#contact-email-config-input input').attr('key')
                    },
                    error: function(datas, status, c) {
                        $('#msg').addClass('alert-danger');
                        $('#msg').removeClass('alert-success');
                        $('#msg strong').text(datas.responseJSON.msg);
                        $('#msg').show();
                    },
                    success: function(datas, status,c) {
                        $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg strong').text(datas.msg);
                        $('#msg').show();
                        $('#contact-email-config').text($('#contact-email-config-input input').val());
                        $('#contact-email-config-input').hide();
                        $('#contact-email-config').show();

                    }
                })
            });

            $('#btnok-contact-address').click(function() {
                $.ajax({
                    url: '/administrator/site-config/save-edit-config',
                    type: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        val: $('#contact-address-config-input input').val(),
                        key: $('#contact-address-config-input input').attr('key')
                    },
                    error: function(datas, status, c) {
                        $('#msg').addClass('alert-danger');
                        $('#msg').removeClass('alert-success');
                        $('#msg strong').text(datas.responseJSON.msg);
                        $('#msg').show();
                    },
                    success: function(datas, status,c) {
                        $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg strong').text(datas.msg);
                        $('#msg').show();
                        $('#contact-address-config').text($('#contact-address-config-input input').val());
                        $('#contact-address-config-input').hide();
                        $('#contact-address-config').show();

                    }
                })
            });

            $('#btnok-phone-number').click(function() {
                $.ajax({
                    url: '/administrator/site-config/save-edit-config',
                    type: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        val: $('#contact-phone-number-config-input input').val(),
                        key: $('#contact-phone-number-config-input input').attr('key')
                    },
                    error: function(datas, status, c) {
                        $('#msg').addClass('alert-danger');
                        $('#msg').removeClass('alert-success');
                        $('#msg strong').text(datas.responseJSON.msg);
                        $('#msg').show();
                    },
                    success: function(datas, status,c) {
                        $('#msg').removeClass('alert-danger');
                        $('#msg').addClass('alert-success');
                        $('#msg strong').text(datas.msg);
                        $('#msg').show();
                        $('#contact-phone-number-config').text($('#contact-phone-number-config-input input').val());
                        $('#contact-phone-number-config-input').hide();
                        $('#contact-phone-number-config').show();

                    }
                })
            });






        //     $('#btnok-submit-password').click(function() {
        //         $.ajax({
        //             url: '/setting/profile/change-password-save',
        //             type: 'post',
        //             data: {
        //                 _token: '{{csrf_token()}}',
        //                 password: $('#password_now').val(),
        //                 password_confirmation: $('#password_confirmation').val(),
        //                 password_old: $('#password_old').val(),
        //             },
        //             error: function(datas, status, c) {
        //                 $('#msg').addClass('alert-'+datas.responseJSON.type);
        //                 $('#msg').removeClass('alert-success');
        //                 $('#msg strong').text(datas.responseJSON.msg);
        //                 $('#msg').show();
        //             },
        //             success: function(datas, status,c) {
        //                 $('#msg').removeClass('alert-danger');
        //                 $('#msg').addClass('alert-success');
        //                 $('#msg strong').text(datas.msg);
        //                 $('#msg').show();
        //                 $('.text-full-name').text($('#full-name-input input').val());
        //                 $('#full-name-input').hide();
        //                 $('#full-name').show();

        //             }
        //         })
        //     });

        // btn cancel :

        $('#btncancel-theme').click(function(){
            $('#theme-config-select').hide();
            $('#theme-config').show();
        });

        $('#btncancel-title').click(function(){
            $('#site-title-config-input').hide();
            $('#site-title-config').show();
        });

        $('#btncancel-contact-email').click(function(){
            $('#contact-email-config-input').hide();
            $('#contact-email-config').show();
        });

        $('#btncancel-contact-address').click(function(){
            $('#contact-address-config-input').hide();
            $('#contact-address-config').show();
        });

        $('#btncancel-phone-number').click(function(){
            $('#contact-phone-number-config-input').hide();
            $('#contact-phone-number-config').show();
        });


        // show onclick label :

        function showThemeConfig() {
            $('#theme-config').hide();
            $('#theme-config-select').show();
            $('#theme-config-select').focus();
        }

        function showContactEmailConfig() {
            $('#contact-email-config').hide();
            $('#contact-email-config-input').show();
            $('#contact-email-config-input input').focus();
        }

        function showSiteTitleConfig() {
            $('#site-title-config').hide();
            $('#site-title-config-input').show();
            $('#site-title-config-input').focus();
        }

        function showContactAddressConfig() {
            $('#contact-address-config').hide();
            $('#contact-address-config-input').show();
            $('#contact-address-config-input input').focus();
        }

        function showContactPhoneNumberConfig() {
            $('#contact-phone-number-config').hide();
            $('#contact-phone-number-config-input').show();
            $('#contact-phone-number-config-input input').focus();
        }

        // function showInputPassword() {
        //     $('#password').hide();
        //     $('.password-input').show();
        //     $('#password-input input').focus();
        // }
        $('#ethereum-address-config').text(btoa('Lorem ipsum dolor sit amet consectetur'))

    </script>

@endsection
