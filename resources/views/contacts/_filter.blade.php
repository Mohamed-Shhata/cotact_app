<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <form action="">
      <div class="row">
        <div class="col">
          <select class="custom-select" id="filter_company_id" name="company_id">
            
            @foreach($companys as $id => $name)
              <option {{$id == request('company_id')?'selected' : ''}} value="{{ $id }}" >{{ $name }}</option>
            @endforeach
            
          </select>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2" id="search" name="search" value="{{ request('search') }}">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" id="btn-clear" type="button" >
                <i class="fa fa-refresh"></i>
              </button>
              <button class="btn btn-outline-secondary" id="button-addon2" type="submit">
                <i class="fa fa-search"></i>
              </button>
              
              
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>