<!-- BEGIN VENDOR JS-->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script>
    document.fonts.onloadingdone = function (fontFaceSetEvent) {
      const fontName = 'Material Icons';
      if (fontFaceSetEvent.fontfaces.filter(i => i.family === fontName).length > 0) {
        addMakeIconsVisibleClass();
      }
    };
    if (navigator.userAgent.toLowerCase().indexOf('chrome') === -1) {
      addMakeIconsVisibleClass();
    }
    function addMakeIconsVisibleClass() {
      let style = document.createElement('style');
      style.innerHTML = '.material-icons,.collapsible-header:after { opacity: 1 !important }';
      document.getElementsByTagName('head')[0].appendChild(style);
    }
  </script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('vendor-script')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('js/plugins.js')}}"></script>
{{--<script src="{{asset('js/search.js')}}"></script>--}}
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('js/custom/custom-script.js')}}"></script>
@if(!empty('isAdmin'))
    <script src="{{asset('js/custom/admin.js')}}"></script>
@endif
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('page-script')
