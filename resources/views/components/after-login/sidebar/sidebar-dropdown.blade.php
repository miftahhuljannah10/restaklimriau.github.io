<li class="px-6 dropdown" aria-expanded="false">
    <div
        class="cursor-pointer flex h-14 items-center justify-between px-6 rounded-xl  transition-all duration-[25] ease-in-out hover:bg-zinc-100 dropdown-title">
        <div class="flex gap-4">
            <div class="w-6 h-6 grid place-items-center text-zinc-500">
                <svg width="18" height="24" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.5 5.53125V21.3438C17.5 22.5346 16.5486 23.5 15.375 23.5H2.625C1.45138 23.5 0.5 22.5346 0.5 21.3438V5.53125C0.5 4.34037 1.45138 3.375 2.625 3.375H6.16667C6.16667 1.78971 7.43768 0.5 9 0.5C10.5623 0.5 11.8333 1.78971 11.8333 3.375H15.375C16.5486 3.375 17.5 4.34037 17.5 5.53125ZM9 2.29688C8.41319 2.29688 7.9375 2.77956 7.9375 3.375C7.9375 3.97044 8.41319 4.45312 9 4.45312C9.58681 4.45312 10.0625 3.97044 10.0625 3.375C10.0625 2.77956 9.58681 2.29688 9 2.29688ZM13.25 7.41797V6.51953C13.25 6.44805 13.222 6.37949 13.1722 6.32894C13.1224 6.2784 13.0548 6.25 12.9844 6.25H5.01562C4.94518 6.25 4.87761 6.2784 4.8278 6.32894C4.77799 6.37949 4.75 6.44805 4.75 6.51953V7.41797C4.75 7.48945 4.77799 7.55801 4.8278 7.60856C4.87761 7.6591 4.94518 7.6875 5.01562 7.6875H12.9844C13.0548 7.6875 13.1224 7.6591 13.1722 7.60856C13.222 7.55801 13.25 7.48945 13.25 7.41797Z"
                        fill="currentColor" />
                </svg>
            </div>
            <span class="font-medium  text-xl">
                @if (isset($title))
                    {{ $title }}
                @else
                    DROPDOWN
                @endif
            </span>

        </div>

        <div class='text-zinc-500'>
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="dropdown-icon">
                <path
                    d="M5.99479 7.78781L0.209273 1.92106C-0.0697577 1.63811 -0.0697577 1.17938 0.209273 0.896463L0.884062 0.212204C1.16262 -0.0702607 1.61407 -0.0708043 1.89328 0.210996L6.50001 4.8605L11.1067 0.210996C11.3859 -0.0708043 11.8374 -0.0702607 12.1159 0.212204L12.7907 0.896463C13.0698 1.17941 13.0698 1.63814 12.7907 1.92106L7.00524 7.78781C6.7262 8.07073 6.27383 8.07073 5.99479 7.78781Z"
                    fill="currentColor" />
            </svg>
        </div>
    </div>

    <div class="dropdown-wrapper text-sm font-medium">
        <ul class="dropdown-content">
            @if (isset($content))
                {{ $content }}
            @else
                CONTENT
            @endif
        </ul>
    </div>
</li>

@once
    <script>
        $(document).ready(function() {
            $('.dropdown-title').click(function() {
                $(this).parent().attr('aria-expanded', function(i, attr) {
                    return attr == 'true' ? 'false' : 'true'
                })
            })
        })
    </script>
@endonce
