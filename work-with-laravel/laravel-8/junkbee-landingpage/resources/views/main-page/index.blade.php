@extends('layout.index')

@section('js')
    {{-- <script>
        function initMap() {
            var options = {
                zoom: 7,
                center: {
                    lat: -6.9714817,
                    lng: 110.4270725
                }
            }
            var map = new google.maps.Map(document.getElementById('maps'), options);
            var marker = new google.maps.Marker({
                position: {
                    lat: -6.9714817,
                    lng: 110.4270725
                },
                map: map,
            })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcVScPGrbk8_3x-84ZVXvgmQRJJkbgAUw&callback=initMap" async
        defer></script> --}}
    <script>
        $('a[href^="#"]').on('click', function(e) {
            // var headerHeight = $("#navbar_top").height();
            var target = $($(this).attr('href'));
            if (target.length) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: target.offset().top - 67.125 - 30
                }, 1000);
            }
        });
        $(document).ready(function() {
            $(".owl-carousel-1").owlCarousel({
                center: true,
                loop: true,
                dots: true,
                nav: true,
                navText: [
                    '<i id="prev-1" class="nav-btn fa-solid fa-circle-chevron-left"></i>',
                    '<i id="next-1" class="nav-btn fa-solid fa-circle-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    992: {
                        items: 3,
                        nav: true
                    },
                }
            });
            $(".owl-carousel-2").owlCarousel({
                center: false,
                loop: true,
                dots: true,
                nav: true,
                navText: [
                    '<i id="prev-2" class="nav-btn-3 fa-solid fa-circle-chevron-left"></i>',
                    '<i id="next-2" class="nav-btn-3 fa-solid fa-circle-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    1242: {
                        items: 2,
                        nav: true
                    },
                }
            });
            $(".owl-carousel-3").owlCarousel({
                center: true,
                loop: true,
                dots: true,
                nav: true,
                navText: [
                    '<i id="prev-1" class="nav-btn-2 fa-solid fa-circle-chevron-left"></i>',
                    '<i id="next-1" class="nav-btn-2 fa-solid fa-circle-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    992: {
                        items: 3,
                        nav: true
                    }
                }
            });
        });
    </script>
@endsection
@section('content')
    @include('main-page.component.home')
    @include('main-page.component.about')
    @include('main-page.component.join-us')
    @include('main-page.component.categories')
    @include('main-page.component.how')
    @include('main-page.component.news')
    @include('main-page.component.map')
    @include('main-page.component.footer')
@endsection
