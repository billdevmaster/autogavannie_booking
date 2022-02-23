<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/app-assets/css/plugins/extensions/ext-component-drag-drop.min.css')}}">
<script src="{{asset('assets/backend/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
<script src="{{asset('assets/backend/app-assets/js/scripts/extensions/ext-component-drag-drop.min.js')}}"></script>
<input type="hidden" id="location_id" value="{{ $location_id }}">
<div class="row">
  <div class="col-md-6 services-wrapper" style="padding: 30px 20px">
    <ul class="list-group text-left" style="margin-bottom: 20px">
      @foreach ($services as $service)
      <li class="list-group-item">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input location-service" id="{{ $service->id }}" type="checkbox" tabindex="3" data-location_id="{{ $location_id }}" data-service_id="{{ $service->id }}" @if (in_array($service->id, $location_service_id_array))
              checked
            @endif/>
            <label class="custom-control-label" for="{{ $service->id }}"> {{ $service->name }} </label>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-6">
    <p>Muuda lohistades teenuste järjekorda</p>
    <ul class="list-group text-left" style="margin-bottom: 20px" id="location_services">
      @foreach ($location_service_array as $service)
      <li class="list-group-item draggable" data-service_id="{{ $service['id'] }}">
        <label> {{ $service['name'] }} </label>
      </li>
      @endforeach
    </ul>
    <div class="form-group">
      <button class="btn btn-primary" onclick="saveOrders()">Salvesta</button>
    </div>
  </div>
</div>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(function() {
    $(".location-edit .services-wrapper .location-service").change(function() {
        
      $.ajax({
          type: 'post',
          url: appUrl + '/admin/locations/saveLocationService',
          data: {location_id: $(this).data("location_id"), service_id: $(this).data("service_id"), is_checked: $(this).prop("checked")},
          // dataType:"JSON",
          // processData: false,
          // contentType: false,
          // cache: false,
          success: (res) => {
              Swal.fire({
                  icon: 'success',
                  title: 'Saved!',
                  text: 'Successfully saved.',
                  customClass: {
                  confirmButton: 'btn btn-success'
                  }
              });
              $.ajax({
                type: 'get',
                url: appUrl + '/admin/locations/getLocationServices',
                data: {id: $("#location_id").val()},
                success: (res) => {
                  $(".location-edit .tab-content #services").html(res)
                },
                error: (err) => {
                  console.log(err)
                }
              })
          },
          error: (err) => {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  customClass: {
                  confirmButton: 'btn btn-primary'
                  },
                  buttonsStyling: false
              });
          }
      })
    });

    dragula([document.getElementById('location_services')]);
  })

  function saveOrders() {
    var services = [];
    $("#location_services").find("li").each(function() {
      services.push($(this).data("service_id"))
    })
    console.log(services)
    $.ajax({
          type: 'post',
          url: appUrl + '/admin/locations/saveLocationServiceOrder',
          data: {location_id: $("#location_id").val(), service_ids: services},
          success: (res) => {
            console.log(res)
              Swal.fire({
                  icon: 'success',
                  title: 'Saved!',
                  text: 'Successfully saved.',
                  customClass: {
                  confirmButton: 'btn btn-success'
                  }
              });
          },
          error: (err) => {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  customClass: {
                  confirmButton: 'btn btn-primary'
                  },
                  buttonsStyling: false
              });
          }
      })
  }
</script>