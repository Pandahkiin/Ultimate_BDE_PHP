<p>
    <a class="btn btn-dark" data-toggle="collapse" href="#add-event" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-plus mr-3"></i>Ajouter un événement !
    </a>
</p>
<div class="collapse" id="add-event">
    <div class="card card-body">
        {!! Form::open(array('url' => 'foo/bar')) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom événement']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description (1500 caractères)') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3', 'maxlength'=>'1500']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recursivity', 'Description (1500 caractères)') !!}
                {!! Form::select('recursivity', ['none' => 'Auncune', 'week' => 'semaine', 'month' => 'Mois', 'year' => 'Année'], null,['class' => 'form-control']); !!}
            </div>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Participation €']) !!}
            {!! Form::submit('Crée !', ['class' => 'btn btn-primary mt-3']) !!}
        {!! Form::close() !!}
    </div>
</div>