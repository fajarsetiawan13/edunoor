@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex justify-center mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex">
                    <div class="flex flex-wrap w-full justify-around md:justify-start">
                        <a href="/dashboard/users" class="p-2">
                            <img class="mask mask-squircle " width="100" height="100" src="/img/menu-user.jpg"
                                alt="Icon Menu Users" />
                        </a>
                        <a href="/dashboard/schools" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-schools.jpg"
                                alt="Icon Menu Schools" />
                        </a>
                        <a href="/dashboard/questionare" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-questionare.jpg"
                                alt="Icon Questionnaire" />
                        </a>
                        <a href="/dashboard/articles" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-articles.jpg"
                                alt="Icon Articles" />
                        </a>
                        <a href="/setting" class="p-2">
                            <img class="mask mask-squircle" width="100" height="100" src="/img/menu-setting.jpg"
                                alt="Icon Setting" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection