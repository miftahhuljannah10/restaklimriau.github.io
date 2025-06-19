@props(['p' => '6'])
@props(['fade_in' => 'true'])

@php
    $uuid = 'dashboard-item';
    $class = 'bg-white rounded-xl border-[1px] border-zinc-200 shadow-xl shadow-gray-200 isolate p-' . $p;
@endphp

<div data-gsap-id="{{ $uuid }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>

@if ($fade_in == 'true')
    @once
        <script>
            $(document).ready(() => {
                (async () => {
                    await new Promise(r => setTimeout(r, 0))

                    gsap.from("[data-gsap-id='{{ $uuid }}']", {
                        opacity: 0,
                        y: -32,
                        duration: .5,
                        ease: "power4.out",
                        delay: .75,
                        stagger: .1,
                    });
                })
                ()
            })
        </script>
    @endonce
@endif
