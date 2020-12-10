<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">

  <ul class="app-menu">
    <li><a class="app-menu__item @if(request()->path() == 'admin/dashboard') active @endif" href="{{route('admin.dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview
    @if(request()->path() == 'admin/generalSetting')
      is-expanded
    @elseif (request()->path() == 'admin/EmailSetting')
      is-expanded
    @elseif (request()->path() == 'admin/SmsSetting')
      is-expanded
    @endif">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Website Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{route('admin.GenSetting')}}"><i class="icon fa fa-cogs"></i> General Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.EmailSetting')}}" rel="noopener"><i class="icon fa fa-envelope"></i> Email Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.SmsSetting')}}"><i class="icon fa fa-mobile"></i> SMS Setting</a></li>
      </ul>
    </li>


    <li><a class="app-menu__item @if(request()->path() == 'admin/packages') active @endif" href="{{route('admin.package')}}"><i class="app-menu__icon fa fa-gift"></i><span class="app-menu__label">Packages</span></a></li>



    <li><a class="app-menu__item @if(request()->path() == 'admin/userManagement/subscribers') active @endif" href="{{route('admin.userManagement.subscribers')}}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Subscribers</span></a></li>

    <li><a class="app-menu__item @if(request()->path() == 'admin/reports') active @endif" href="{{route('admin.reports')}}"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Reports</span></a></li>


    <li class="treeview
    @if (request()->path() == 'admin/userManagement/allUsers')
      is-expanded
    @elseif (request()->path() == 'admin/userManagement/bannedUsers')
      is-expanded
    @elseif (request()->path() == 'admin/userManagement/verifiedUsers')
      is-expanded
    @elseif (request()->path() == 'admin/userManagement/mobileUnverifiedUsers')
      is-expanded
    @elseif (request()->path() == 'admin/userManagement/emailUnverifiedUsers')
      is-expanded
    @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{route('admin.allUsers')}}"><i class="icon fa fa-users"></i> All Users</a></li>
        <li><a class="treeview-item" href="{{route('admin.bannedUsers')}}"><i class="icon fa fa-times"></i> Banned Users</a></li>
        <li><a class="treeview-item" href="{{route('admin.verifiedUsers')}}"><i class="icon fa fa-check"></i> Verified Users</a></li>
        <li><a class="treeview-item" href="{{route('admin.mobileUnverifiedUsers')}}"><i class="icon fa fa-mobile"></i> Mobile Unverified Users</a></li>
        <li><a class="treeview-item" href="{{route('admin.emailUnverifiedUsers')}}"><i class="icon fa fa-envelope"></i> Email Unverified Users</a></li>
      </ul>
    </li>



    <li><a class="app-menu__item @if(request()->path() == 'admin/gateways') active @endif" href="{{route('admin.gateways')}}"><i class="app-menu__icon fa fa-cc-mastercard"></i><span class="app-menu__label">Gateways</span></a></li>


    <li class="treeview
    @if (request()->path() == 'admin/interfaceControl/logoIcon/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/headerText/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/fpro/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/subsc/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/contact/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/social/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/background/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/footer/index')
      is-expanded
    @elseif (request()->path() == 'admin/interfaceControl/client/index')
      is-expanded
    @endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-desktop"></i><span class="app-menu__label">Interface Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{route('admin.logoIcon.index')}}"><i class="icon fa fa-cogs"></i> Logo+Icon Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.headerText.index')}}"><i class="icon fa fa-cogs"></i> Header Text Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.fjob.index')}}"><i class="icon fa fa-cogs"></i> Featured Profile Section</a></li>
        <li><a class="treeview-item" href="{{route('admin.subsc.index')}}"><i class="icon fa fa-cogs"></i> Subscription Section</a></li>
        <li><a class="treeview-item" href="{{route('admin.client.index')}}"><i class="icon fa fa-cogs"></i> Story Section</a></li>
        <li><a class="treeview-item" href="{{route('admin.contact.index')}}"><i class="icon fa fa-cogs"></i> Contact Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.social.index')}}"><i class="icon fa fa-cogs"></i> Social Links Setting</a></li>
        <li><a class="treeview-item" href="{{route('admin.background.index')}}"><i class="icon fa fa-cogs"></i> Background Image</a></li>
        <li><a class="treeview-item" href="{{route('admin.footer.index')}}"><i class="icon fa fa-cogs"></i> Footer Text</a></li>
      </ul>
    </li>


    <li class="treeview
    @if(request()->path() == 'admin/deposit/pending')
      is-expanded
    @elseif (request()->path() == 'admin/deposit/acceptedRequests')
      is-expanded
    @elseif (request()->path() == 'admin/deposit/rejectedRequests')
      is-expanded
    @elseif (request()->path() == 'admin/deposit/depositLog')
      is-expanded
    @endif">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-download"></i><span class="app-menu__label">Deposit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{route('admin.deposit.pending')}}"><i class="icon fa fa-hourglass"></i> Pending Request</a></li>
        <li><a class="treeview-item" href="{{route('admin.deposit.acceptedRequests')}}" rel="noopener"><i class="icon fa fa-check"></i> Accepted Request</a></li>
        <li><a class="treeview-item" href="{{route('admin.deposit.rejectedRequests')}}"><i class="icon fa fa-times"></i> Rejected Request</a></li>
        <li><a class="treeview-item" href="{{route('admin.deposit.depositLog')}}"><i class="icon fa fa-desktop"></i> Deposit Log</a></li>
      </ul>
    </li>


    <li><a class="app-menu__item @if(request()->path() == 'admin/trxlog') active @endif" href="{{route('admin.trxLog')}}"><i class="app-menu__icon fa fa-exchange"></i><span class="app-menu__label">Transaction Log</span></a></li>


    <li><a class="app-menu__item @if(request()->path() == 'admin/menuManager/index') active @endif" href="{{route('admin.menuManager.index')}}"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Menu Management</span></a></li>

      <li><a class="app-menu__item
        @if(request()->path() == 'admin/Ad/index')
          active
        @elseif(request()->path() == 'admin/Ad/create')
          active
        @endif" href="{{route('admin.ad.index')}}"><i class="app-menu__icon fa fa-buysellads"></i> <span class="app-menu__label"> Advertisement</span></a></li>
  </ul>
</aside>
