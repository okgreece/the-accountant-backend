<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

<h1>The Accountant Analytics</h1>

<h2>Personal Amount Earned per session</h2>
<div style="width:75%;">
    {!! $earnings->render() !!}
</div>

<h2>Political Risk Taken</h2>
<div style="width:75%;">
    {!! $risk_political->render() !!}
</div>


<h2>Police Risk Taken</h2>
<div style="width:75%;">
    {!! $risk_police->render() !!}
</div>


<h2>Contractors Risk Taken</h2>
<div style="width:75%;">
    {!! $risk_contractors->render() !!}
</div>

<h2>Steps Taken</h2>
<div style="width:75%;">
    {!! $steps->render() !!}
</div>

<h2>Endings distribution</h2>
<div style="width:75%;">
    {!! $endings->render() !!}
</div>
