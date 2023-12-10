@section('footer')
    <img class="footer-img" src="{{ asset('assets/logo.png') }}" alt="community connect logo with text" />
    <ul class="footer-links-left">
        <li class="footer-link">
            <a href="{{ route('about-contact-us') }}">About & Contact Us</a>
        </li>
        <li class="footer-link">
            <a href="{{ route('main-features') }}">Main Features</a>
        </li>
        <li class="footer-link">
            <a href="{{ route('faq') }}">FAQ</a>
        </li>
    </ul>
@endsection
