@extends('../_shared/layout')

@section('title', 'Home')
@section('main')
<div id="intro" class="bg-image shadow-2-strong">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.5); height:  100vh;">
    <div class="container d-flex align-items-center justify-content-center text-center h-100">
      <div class="d-flex" style=justify-content:center;align-items:center;flex-direction:column;>
        <div class="text-white">
          <h1 class="mb-3 display-1 text-uppercase"><strong>{{ __("message.Recycon Shop") }}</strong></h1>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<x-main>

    <header class="text-center">
        <x-title-section>{{ __("message.About Us") }}</x-title-section>
    </header>

    <div class="w-100 d-flex justify-content-center">
        <p class="border border-secondary text-center w-75 p-4 border-dashed">{{ __("message.About Us Texting") }}</p>
    </div>

</x-main>
@endsection

{{-- <script type="text/javascript">  
  // var url = "{{ route('languageChanges') }}";
  
  // selectedLang.addEventListener('change', (e) => {
  //   console.log(selectedLang);
  //   const selectedLang = document.querySelector('#languageChanges').value;
  //   const lang = e.target.value;
  //   console.log(lang)
  // })

  // $(".languageChanges").change(function(){
  //   console.log($(this).val());
  //     // window.location.href = url + "?lang="+ $(this).val();
  // });  
</script> --}}
