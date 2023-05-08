@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex items-start flex-col-reverse justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 invisible md:visible shadow-lg md:w-1/3">
            <div class="card-body">
                <h2 class="card-title">Menu</h2>
                <div class="divider my-0"></div>
                @include('layout.dashboard-sidebar')
            </div>
        </div>
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex">
                    <div class="flex flex-wrap w-full justify-around md:justify-start">
                        <a href="/dashboard/users" class="p-2">
                            <img class="mask mask-squircle " width="100" height="100" src="/img/menu-user.jpg" alt="Icon Menu Users" />
                        </a>
                        <a href="/qr" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-qr.jpg" alt="Icon Menu Schools" />
                        </a>
                        <a href="/dashboard/articles" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-articles.jpg" alt="Icon Articles" />
                        </a>
                        @can('admin')
                        <a href="/dashboard/schools" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-schools.jpg" alt="Icon Menu Schools" />
                        </a>
                        <a href="/dashboard/questionare" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-questionare.jpg"  alt="Icon Questionnaire" />
                        </a>
                        @endcan
                        <a href="/setting" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-setting.jpg" alt="Icon Setting" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection