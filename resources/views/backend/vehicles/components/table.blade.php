<!-- Responsive Datatable -->
<section id="vehicleType-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Sõiduki tüübid</h4>
                    <div>
                        <a href="{{route('admin.import.cars')}}" class="btn btn-success waves-effect waves-float waves-light">Uuenda sõidukite andmebaasi</a>
                        <Button class="btn btn-primary waves-effect waves-float waves-light" data-toggle="modal" data-target="#vehicle_type_modal" onclick="addNewVehicle()">Lisa sõiduk</Button>
                    </div>
                </div>
                <div class="card-datatable col-12">
                    <table class="table datatables-ajax" id="vehicle_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="45%">Nimetus</th>
                                <th width="45%">Ikoon</th>
                                <th>Tegevused</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Responsive Datatable -->
<script>
    function addNewVehicle() {
        $("#vechileTypeModal #vehicle_id").val(0);
    }
</script>