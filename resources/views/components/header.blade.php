<?php

use function Livewire\Volt\{state};

$logout = function (){
    Auth::logout();
    return redirect('/login');
};

?>

<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    @volt
    <div class="container d-flex align-items-stretch">
        <!--begin::Header Logo-->
        <div class="header-logo">
            <a href="index.html">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo.svg') }}" class="logo-default max-h-60px" />
                <img alt="Logo" src="{{ asset('assets/media/logos/logo.svg') }}" class="logo-sticky max-h-60px" />
            </a>
        </div>
        <!--end::Header Logo-->
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left mx-auto" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <ul class="menu-nav ">
                    <li class="menu-item {{ request()->is('/') ? 'menu-item-here' : '' }} ">
                        <a href="/admin" class="menu-link">
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ request()->is('admin/e-book*') ? 'menu-item-here' : '' }}">
                        <a href="/admin/e-book" class="menu-link">
                            <span class="menu-text">E Book</span>
                        </a>
                    </li> --}}
                    <li class="menu-item menu-item-submenu menu-item-rel  {{ request()->is('admin/book*') ? 'menu-item-here' : '' }}" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Buku Induk</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="/admin/book" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Daftar Buku</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="/admin/book/loan" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Data Peminjaman</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item  {{ request()->is('admin/archive*') ? 'menu-item-here' : '' }}">
                        <a href="/admin/archive" class="menu-link">
                            <span class="menu-text">Arsip Skripsi</span>
                        </a>
                    </li>
                    <li class="menu-item  {{ request()->is('admin/report*') ? 'menu-item-here' : '' }}">
                        <a href="/admin/report" class="menu-link">
                            <span class="menu-text">Report</span>
                        </a>
                    </li>
                    <li class="menu-item menu-item-submenu menu-item-rel  {{ request()->is('admin/master-data*') ? 'menu-item-here' : '' }}" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-text">Master Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="/admin/master-data/admin" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Admin</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true">
                                    <a href="/admin/account" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Akun Terdaftar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                        <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ auth()->user()->name }}</span>
                        <span class="symbol symbol-35">
                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">S</span>
                        </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center p-8 rounded-top">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                            <img src="assets/media/users/300_21.jpg" alt="" />
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ auth()->user()->name}}</div>
                        <span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span>
                        <!--end::Text-->
                    </div>
                    <div class="separator separator-solid"></div>
                    <!--end::Header-->
                    <!--begin::Nav-->
                    <div class="navi navi-spacer-x-0 pt-5">
                        <!--begin::Item-->
                        <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-calendar-3 text-success"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Profile</div>
                                    <div class="text-muted">Account settings and more
                                    <span class="label label-light-danger label-inline font-weight-bold">update</span></div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <a href="custom/apps/user/profile-3.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-mail text-warning"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Messages</div>
                                    <div class="text-muted">Inbox and tasks</div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <a href="custom/apps/user/profile-2.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-rocket-1 text-danger"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Activities</div>
                                    <div class="text-muted">Logs and notifications</div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <a href="custom/apps/userprofile-1/overview.html" class="navi-item px-8">
                            <div class="navi-link">
                                <div class="navi-icon mr-2">
                                    <i class="flaticon2-hourglass text-primary"></i>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold">My Tasks</div>
                                    <div class="text-muted">latest tasks and projects</div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->
                        <!--begin::Footer-->
                        <div class="navi-separator mt-3"></div>
                        <div class="navi-footer px-8 py-5">
                            <a href="javascript:;" wire:click="logout" class="btn btn-light-primary font-weight-bold">Sign Out</a>
                            <a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean font-weight-bold">Upgrade Plan</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    @endvolt
    <!--end::Container-->
</div>