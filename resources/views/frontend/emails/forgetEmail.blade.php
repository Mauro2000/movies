@extends('beautymail::templates.minty',['title'=>'Recuperação da palavra-passe','css'=>"",'unsubscribe'=>config('app.name').' '.date('Y'),'logo'=>['path'=>'https://templates.iqonic.design/streamit/frontend/html/images/logo.png']])

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="sub-title">
				Alguém solicitou que a palavra-passe fosse redefinida para a seguinte conta
			</td>
		</tr>
		<tr>
			<td class="paragraph">
				Para redefinir a sua palavra-passe , visite o seguinte endereço
			</td>
		</tr>
        <tr>
            <td width="100%" height="25"></td>
        </tr>
		<tr>
			<td>
                @include('beautymail::templates.minty.button', [
                    'text' => 'Clique aqui para redefinir a sua palavra-passe',
                     'link' => route('reset.password.get', $token)
                    ])
            </td>
		</tr>
        <tr>
            <td width="100%" height="10"> </td>
        </tr>
		<tr>
			<td class="paragraph">
				O seu email: {{$email}}
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				Se isto foi um erro, basta ignorar este e-mail
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop
