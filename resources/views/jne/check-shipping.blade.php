@extends('admin-template2')

@section('content-wrapper')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
      </h1>

    </section>

  

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-body">
              <form method="post" action="{{ action('OngkirController@processShipping') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <!-- text input -->
                <div class="form-group">
                  <label>Asal</label>
                  <select id="origin" class="form-control" name="origin">
                    <option selected="selected" value="">Pilih Asal</option>
                    @foreach($city as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Tujuan</label>
                  <select id="destination" class="form-control" name="destination">
                    <option selected="selected" value="">Pilih Tujuan</option>
                    @foreach($city as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Berat(gram)</label>
                  <input type="text" name="weight" class="form-control" placeholder="Enter ...">
                </div>

                <div class="form-group">
                  <label>Jasa</label>
                  <select id="jasa" class="form-control" name="jasa">
                    <option selected="selected" value="">Pilih Tujuan</option>
                    
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
                    
                  </select>
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>

              </form>
            </div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
                
                
                
          
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @stop
