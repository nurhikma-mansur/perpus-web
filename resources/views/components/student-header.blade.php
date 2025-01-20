<?php

use function Livewire\Volt\{state};

$logout = function (){
    Auth::logout();
    return redirect('/login');
};

?>

<div id="kt_header" class="header header-fixed">
    @volt
    <!--begin::Container-->
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
                        <a href="/" class="menu-link">
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('e-book*') ? 'menu-item-here' : '' }}">
                        <a href="/e-book" class="menu-link">
                            <span class="menu-text">E Book</span>
                        </a>
                    </li>
                    <li class="menu-item  {{ request()->is('archive*') ? 'menu-item-here' : '' }}">
                        <a href="/archive" class="menu-link">
                            <span class="menu-text">Arsip Skripsi</span>
                        </a>
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
                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{ auth()->user()->name[0] }}</span>
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
                        <!--end::Text-->
                    </div>
                    <div class="separator separator-solid"></div>
                    <!--end::Header-->
                    <!--begin::Nav-->
                    <div class="navi navi-spacer-x-0 ">
                        <div class="navi-footer px-8 py-5">
                            <a href="javascript:;" wire:click="logout" class="btn btn-light-danger btn-block font-weight-bold">Keluar</a>
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
    <!--end::Container-->
    @endvolt
</div>