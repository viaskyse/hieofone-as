@extends('layouts.app')
@section('view.stylesheet')
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title" style="height:35px;display:table-cell !important;vertical-align:middle;">Invite a user to access your resources</h4>
				</div>
				<div class="panel-body">

					<div style="text-align: center;">
					  <i class="fa fa-child fa-5x" aria-hidden="true" style="margin:20px;text-align: center;"></i>
					</div>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/make_invitation') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="col-md-4 control-label">First Name</label>

							<div class="col-md-6">
								<input id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}">

								@if ($errors->has('first_name'))
									<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label for="last_name" class="col-md-4 control-label">Last Name</label>

							<div class="col-md-6">
								<input id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}">

								@if ($errors->has('last_name'))
									<span class="help-block">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
							<label for="role" class="col-md-4 control-label">Role</label>

							<div class="col-md-6">
								<select class="form-control" id="role" name="role" value="{{ old('role') }}">
									{!! $roles !!}
								</select>

								@if ($errors->has('role'))
									<span class="help-block">
										<strong>{{ $errors->first('role') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('custom_policy') ? ' has-error' : '' }}">
							<label for="custom_policies" class="col-md-4 control-label">Custom Policy</label>

							<div class="col-md-6">
								<select class="form-control" id="custom_policy" name="custom_policy" value="{{ old('custom_policy') }}">
									{!! $custom_policy !!}
								</select>

								@if ($errors->has('custom_policy'))
									<span class="help-block">
										<strong>{{ $errors->first('custom_policy') }}</strong>
									</span>
								@endif
							</div>
						</div>

						@if (isset($user_policies))
							{!! $user_policies !!}
						@endif

						@if (isset($rs))
							{!! $rs !!}
						@endif

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-sign-in"></i> Send Invitation
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('view.scripts')
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#email").focus();
		$('#all_resources').on('click', function() {
			if ($(this).is(':checked')) {
				$('.client_ids').prop('checked', true);
			} else {
				$('.client_ids').prop('checked', false);
			}
			$('.client_ids').triggerHandler('change');
		});
		$('.client_ids').on('click', function(){
			if (!$(this).is(':checked')) {
				$('#all_resources').prop('checked', false);
				$('#all_resources').triggerHandler('change');
			}
		});
	});
</script>
@endsection
