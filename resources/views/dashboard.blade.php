<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>

        th, td{
            padding: 10px;
        }
    </style>
<html>
<script>
    function toggle() {

        if( document.getElementById("hide").style.display ==='none' ){
            document.getElementById("hide").style.display = 'block';
        }else{
            document.getElementById("hide").style.display = 'none';
        }
    }
</script>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" enctype="multipart/form-data" action="/savepassword" >
                        @csrf
                        You're logged in!</br>
                        <table border=0 style="text-align:left">
                            <tr><td style="text-align:right">Enter a password to be encrypted:</td><td> <input type="password" name="pwd"></td></tr>
                            <tr><td style="text-align:right">Give it a label:</td><td> <input type="text" name="label"></td></tr>
                            <tr><td style="text-align:right"></td><td><input type="submit" value="Enter" name="submit"></td></tr>
                        </table>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button onClick="toggle();">Click here to show passwords and labels</button><br /><br />
                    <table class="hidden" id="hide">
                        @foreach ($entries as $entry)
                            <tr>
                                <th>Label</th>
                                <td>{{$entry->label}}</td>
                                <th>Password</th>
                                <td>{{\Illuminate\Support\Facades\Crypt::decryptString($entry->saved_password)}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</html>
</x-app-layout>
