<li class="px-6">
    <a href="{{ route('users.index') }}" class="contents">
      <div
        class="flex h-14 items-center gap-4 px-6 rounded-xl  transition-all duration-[25] ease-in-out {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500' : 'hover:bg-zinc-100' }}">
        <div
          class="w-6 h-6 grid place-items-center {{ Route::currentRouteName() === 'users.index' ? 'text-white' : 'text-zinc-500' }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M3.6 10.8001C4.92375 10.8001 6 9.72385 6 8.4001C6 7.07635 4.92375 6.0001 3.6 6.0001C2.27625 6.0001 1.2 7.07635 1.2 8.4001C1.2 9.72385 2.27625 10.8001 3.6 10.8001ZM20.4 10.8001C21.7238 10.8001 22.8 9.72385 22.8 8.4001C22.8 7.07635 21.7238 6.0001 20.4 6.0001C19.0763 6.0001 18 7.07635 18 8.4001C18 9.72385 19.0763 10.8001 20.4 10.8001ZM21.6 12.0001H19.2C18.54 12.0001 17.9438 12.2663 17.5088 12.6976C19.02 13.5263 20.0925 15.0226 20.325 16.8001H22.8C23.4638 16.8001 24 16.2638 24 15.6001V14.4001C24 13.0763 22.9238 12.0001 21.6 12.0001ZM12 12.0001C14.3213 12.0001 16.2 10.1213 16.2 7.8001C16.2 5.47885 14.3213 3.6001 12 3.6001C9.67875 3.6001 7.8 5.47885 7.8 7.8001C7.8 10.1213 9.67875 12.0001 12 12.0001ZM14.88 13.2001H14.5688C13.7888 13.5751 12.9225 13.8001 12 13.8001C11.0775 13.8001 10.215 13.5751 9.43125 13.2001H9.12C6.735 13.2001 4.8 15.1351 4.8 17.5201V18.6001C4.8 19.5938 5.60625 20.4001 6.6 20.4001H17.4C18.3938 20.4001 19.2 19.5938 19.2 18.6001V17.5201C19.2 15.1351 17.265 13.2001 14.88 13.2001ZM6.49125 12.6976C6.05625 12.2663 5.46 12.0001 4.8 12.0001H2.4C1.07625 12.0001 0 13.0763 0 14.4001V15.6001C0 16.2638 0.53625 16.8001 1.2 16.8001H3.67125C3.9075 15.0226 4.98 13.5263 6.49125 12.6976Z"
              fill="currentColor"/>
          </svg>

        </div>
        <span
          class=" {{ Route::currentRouteName() === 'users.index' ? 'text-white font-semibold' : 'font-medium' }}  text-xl">Pengguna</span>
      </div>
    </a>
  </li>

  <li class="px-6">
    <a href="{{ route('users.index') }}" class="contents">
      <div
        class="flex h-14 items-center gap-4 px-6 rounded-xl  transition-all duration-[25] ease-in-out {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500' : 'hover:bg-zinc-100' }}">
        <div
          class="w-6 h-6 grid place-items-center {{ Route::currentRouteName() === 'users.index' ? 'text-white' : 'text-zinc-500' }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M23.4 15.5999H22.8V11.5462C22.8 11.0699 22.6088 10.6124 22.2713 10.2749L18.525 6.52865C18.1875 6.19115 17.73 5.9999 17.2538 5.9999H15.6V4.1999C15.6 3.20615 14.7938 2.3999 13.8 2.3999H1.8C0.80625 2.3999 0 3.20615 0 4.1999V16.1999C0 17.1937 0.80625 17.9999 1.8 17.9999H2.4C2.4 19.9874 4.0125 21.5999 6 21.5999C7.9875 21.5999 9.6 19.9874 9.6 17.9999H14.4C14.4 19.9874 16.0125 21.5999 18 21.5999C19.9875 21.5999 21.6 19.9874 21.6 17.9999H23.4C23.73 17.9999 24 17.7299 24 17.3999V16.1999C24 15.8699 23.73 15.5999 23.4 15.5999ZM6 19.7999C5.00625 19.7999 4.2 18.9937 4.2 17.9999C4.2 17.0062 5.00625 16.1999 6 16.1999C6.99375 16.1999 7.8 17.0062 7.8 17.9999C7.8 18.9937 6.99375 19.7999 6 19.7999ZM18 19.7999C17.0063 19.7999 16.2 18.9937 16.2 17.9999C16.2 17.0062 17.0063 16.1999 18 16.1999C18.9938 16.1999 19.8 17.0062 19.8 17.9999C19.8 18.9937 18.9938 19.7999 18 19.7999ZM21 11.9999H15.6V7.7999H17.2538L21 11.5462V11.9999Z"
              fill="currentColor"/>
          </svg>

        </div>
        <span
          class=" {{ Route::currentRouteName() === 'users.index' ? 'text-white font-semibold' : 'font-medium' }}  text-xl">Supplier</span>
      </div>
    </a>
  </li>

  <li class="px-6">
    <a href="{{ route('users.index') }}" class="contents">
      <div
        class="flex h-14 items-center gap-4 px-6 rounded-xl  transition-all duration-[25] ease-in-out {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500' : 'hover:bg-zinc-100' }}">
        <div
          class="w-6 h-6 grid place-items-center {{ Route::currentRouteName() === 'users.index' ? 'text-white' : 'text-zinc-500' }}">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10.2758 0.319366L1.33659 3.67158C0.532917 3.97242 0 4.74601 0 5.60556V15.2797C0 16.0619 0.442665 16.7753 1.13889 17.1234L10.0781 21.5931C10.6583 21.8853 11.3417 21.8853 11.9219 21.5931L20.8611 17.1234C21.5616 16.7753 22 16.0576 22 15.2797V5.60556C22 4.74601 21.4671 3.97672 20.6634 3.67588L11.7242 0.323664C11.26 0.14316 10.7443 0.14316 10.2758 0.319366ZM11.0021 2.98825L19.2538 6.0826V6.12988L11.0021 9.48209L2.75054 6.12988V6.0826L11.0021 2.98825ZM12.3774 18.2881V11.8888L19.2538 9.0953V14.8499L12.3774 18.2881Z"
              fill="currentColor"/>
          </svg>
        </div>
        <span
          class=" {{ Route::currentRouteName() === 'users.index' ? 'text-white font-semibold' : 'font-medium' }}  text-xl">Produk</span>
      </div>
    </a>
  </li>

  <li class="px-6">
    <a href="{{ route('users.index') }}" class="contents">
      <div
        class="flex h-14 items-center gap-4 px-6 rounded-xl  transition-all duration-[25] ease-in-out {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500' : 'hover:bg-zinc-100' }}">
        <div
          class="w-6 h-6 grid place-items-center {{ Route::currentRouteName() === 'users.index' ? 'text-white' : 'text-zinc-500' }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M22.625 13.25H19.5V17L18.25 16.168L17 17V13.25H13.875C13.5312 13.25 13.25 13.5312 13.25 13.875V21.375C13.25 21.7188 13.5312 22 13.875 22H22.625C22.9688 22 23.25 21.7188 23.25 21.375V13.875C23.25 13.5312 22.9688 13.25 22.625 13.25ZM7.625 10.75H16.375C16.7188 10.75 17 10.4688 17 10.125V2.625C17 2.28125 16.7188 2 16.375 2H13.25V5.75L12 4.91797L10.75 5.75V2H7.625C7.28125 2 7 2.28125 7 2.625V10.125C7 10.4688 7.28125 10.75 7.625 10.75ZM10.125 13.25H7V17L5.75 16.168L4.5 17V13.25H1.375C1.03125 13.25 0.75 13.5312 0.75 13.875V21.375C0.75 21.7188 1.03125 22 1.375 22H10.125C10.4688 22 10.75 21.7188 10.75 21.375V13.875C10.75 13.5312 10.4688 13.25 10.125 13.25Z"
              fill="currentColor"/>
          </svg>

        </div>
        <span
          class=" {{ Route::currentRouteName() === 'users.index' ? 'text-white font-semibold' : 'font-medium' }}  text-xl">Bahan</span>
      </div>
    </a>
  </li>

  <x-after-login.sidebar.sidebar-dropdown>
    <x-slot:title>
      Transaksi
    </x-slot:title>
    <x-slot:content>
      <a href="{{ route('users.create') }}">
        <li
          class="h-10 flex items-center px-12 rounded-lg {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500 text-white cursor-default' : 'cursor-pointer hover:bg-zinc-100 text-zinc-700' }}">
          <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4 0C1.79032 0 0 1.79032 0 4C0 6.20968 1.79032 8 4 8C6.20968 8 8 6.20968 8 4C8 1.79032 6.20968 0 4 0Z"
              fill="currentColor"/>
          </svg>
          <span class="ml-2">Penjualan</span>
        </li>
      </a>
      <a href="{{ route('users.index') }}">
        <li
          class="h-10 flex items-center px-12 rounded-lg {{ Route::currentRouteName() === 'users.index' ? 'bg-primary-500 text-white cursor-default' : 'cursor-pointer hover:bg-zinc-100 text-zinc-700' }}">
          <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4 0C1.79032 0 0 1.79032 0 4C0 6.20968 1.79032 8 4 8C6.20968 8 8 6.20968 8 4C8 1.79032 6.20968 0 4 0Z"
              fill="currentColor"/>
          </svg>
          <span class="ml-2">Resupply</span>
        </li>
      </a>

    </x-slot:content>
  </x-after-login.sidebar.sidebar-dropdown>
