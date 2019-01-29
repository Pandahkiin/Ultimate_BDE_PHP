<h3>L'étudiant {{$name}} à passé la commande {{$orderID}}</h3>
<h4>E-mail : {{$email}}</h4>

<div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_cart as $contain)
                <tr>
                  <th>{{$contain->goodie->name}}</th>
                  <td>{{$contain->quantity}}</td>
                  <td>{{$contain->quantity*$contain->goodie->price}} €</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <th>Total :</th>
                    <th>{{App\Models\Site\Order::totalOrderCost($orderID)}} €</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>