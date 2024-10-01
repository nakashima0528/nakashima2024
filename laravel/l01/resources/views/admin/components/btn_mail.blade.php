<div class="dropdown">
  <a class="btn btn-ghost-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-envelope"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('users.mail', [$user->id,1]) }}">{{ config('const.infomationmail.template.system_settings.1.name') }}</a>
    <a class="dropdown-item" href="{{ route('users.mail', [$user->id,2]) }}">{{ config('const.infomationmail.template.system_settings.2.name') }}</a>
    <a class="dropdown-item" href="{{ route('users.mail', [$user->id,3]) }}">{{ config('const.infomationmail.template.system_settings.3.name') }}</a>
  </div>
</div>