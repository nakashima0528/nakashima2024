            <!-- Type Id Field -->
            {!! Form::hidden('type', config('const.address.type.SHIPPING')) !!}

            <!-- Name Field -->
            <div class="formGroup">
              <label>Address book name *</label>
              {!! Form::text('name', null, $errors->has('name') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('name'))
              <p class="homeForm__error">{{ $errors->first('name') }}</p>
              @endif
            </div>

            <!-- Recipient Field -->
            <div class="formGroup">
              <label>Recipient name *</label>
              {!! Form::text('recipient', null, $errors->has('recipient') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('recipient'))
              <p class="homeForm__error">{{ $errors->first('recipient') }}</p>
              @endif
            </div>

            <!-- Country Field -->
            <div class="formGroup">
              <label>Country / Region *</label>
              {!! Form::text('country', null, $errors->has('country') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('country'))
              <p class="homeForm__error">{{ $errors->first('country') }}</p>
              @endif
            </div>

            <!-- Address1 Field -->
            <div class="formGroup">
              <label>Address line 1 *</label>
              {!! Form::text('address1', null, $errors->has('address1') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('address1'))
              <p class="homeForm__error">{{ $errors->first('address1') }}</p>
              @endif
            </div>

            <!-- Address2 Field -->
            <div class="formGroup">
              <label>Address line 2</label>
              {!! Form::text('address2', null, $errors->has('address2') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('address2'))
              <p class="homeForm__error">{{ $errors->first('address2') }}</p>
              @endif
            </div>

            <!-- City Field -->
            <div class="formGroup">
              <label>Town / City *</label>
              {!! Form::text('city', null, $errors->has('city') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('city'))
              <p class="homeForm__error">{{ $errors->first('city') }}</p>
              @endif
            </div>

            <!-- County Field -->
            <div class="formGroup">
              <label>County / State / Province</label>
              {!! Form::text('county', null, $errors->has('county') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('county'))
              <p class="homeForm__error">{{ $errors->first('county') }}</p>
              @endif
            </div>

            <!-- Post Field -->
            <div class="formGroup">
              <label>Postal code / Zip *</label>
              {!! Form::text('post', null, $errors->has('post') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('post'))
              <p class="homeForm__error">{{ $errors->first('post') }}</p>
              @endif
            </div>

            <!-- Submit Field -->
            <div class="formBtn">
              <button class="arrowBtn" type="submit">Save A New Shipping Address</button>
            </div>
