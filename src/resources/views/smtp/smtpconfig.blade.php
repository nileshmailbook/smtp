@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>SMTP Configuration</strong></div>
        <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif                    
          @if(empty($smtp))
          <form action="{{route('smtp.store')}}" method="POST" role="form">
            @csrf
            @else
            <form action="{{route('smtp.update',[$smtp->id])}}" method="POST" role="form">
              @csrf
              @endif
              <div class="row">
                <div class="col-md-6 form-group">
                  <strong>Driver <span style="color: red">*</span></strong>
                  <input type="text" name="driver" class="form-control"  value="{{@$smtp->driver}}" placeholder="Input driver example:smtp or mail" required>
                </div>
                <div class="col-md-6 form-group">
                  <strong>Host <span style="color: red">*</span></strong>
                  <input type="text" name="host" class="form-control" value="{{@$smtp->host}}"  placeholder="Input host example smtp.gmail.com" required>
                </div>
                <div class="col-md-6 form-group">
                  <strong>Username <span style="color: red">*</span></strong>
                  <input type="text" name="username" class="form-control" value="{{@$smtp->username}}"  placeholder="Input username example abc@example.com" required>
                </div>
                <div class="col-md-6 form-group">
                  <strong>Password <span style="color: red">*</span></strong>
                  <input type="text" name="password" class="form-control" value="{{@$smtp->password}}"  placeholder="Input password" required>
                </div>
                <div class="col-md-4 form-group">
                  <strong>Encryption <span style="color: red">*</span></strong>
                  <input type="text"  name="encryption" class="form-control" value="{{@$smtp->encryption}}"  placeholder="Input encryption eg. tls or ssl, etc.." required>
                </div>
                <div class="col-md-4 form-group">
                  <strong>Port <span style="color: red">*</span></strong>
                  <input type="text"  name="port" class="form-control" value="{{@$smtp->port}}"  placeholder="Input encryption eg. tls or ssl, etc.." required>
                </div>
                <div class="col-md-4 form-group">
                  <strong>Sender Name <span style="color: red">*</span></strong>
                  <input type="text" name="name" class="form-control" value="{{@$smtp->name}}" placeholder="Input name" required>
                </div>
                <div class="col-md-12 form-group">
                  <strong>Recipient <span style="color: red">*</span></strong>
                  <input type="text" name="recipient" class="form-control" value="{{@$smtp->recipient}}"  placeholder="Input recipient eg.abc@example.com,test@example.com" required>
                </div>                
              </div>
              <button type="submit" class="btn btn-primary btn-sm"> @if(empty($smtp)) Submit @else Update @endif</button>
            </form>
          </div>
        </div>
      </div>    
    </div>
    <br>
     {{-- test check smtp --}}
    <div class="row justify-content-center">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>SMTP Test Check</strong></div>
        <div class="card-body">
        
          <form action="{{route('smtp.check')}}" method="POST" role="form">
            @csrf
           
              <div class="row">
                
                <div class="col-md-12 form-group">
                  <strong>Input Email <span style="color: red">*</span></strong>
                  <input type="text" name="email" class="form-control" value=""  placeholder="Input email eg.abc@example.com" required>
                </div>                
              </div>
              <button type="submit" class="btn btn-primary btn-sm"> Test Now</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endsection