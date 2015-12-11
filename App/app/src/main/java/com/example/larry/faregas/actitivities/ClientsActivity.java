package com.example.larry.faregas.actitivities;

import android.app.FragmentManager;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.MenuItem;
import android.widget.ListView;
import android.support.v7.widget.Toolbar;

import com.example.larry.faregas.R;
import com.example.larry.faregas.adapters.ClientsArrayAdapter;
import com.example.larry.faregas.dialog.ClientCreateDialog;
import com.example.larry.faregas.models.Client;
import com.example.larry.faregas.net.RestClient;
import com.example.larry.faregas.net.response.ClientAllResponse;
import com.example.larry.faregas.util.AlertDialogUtil;
import com.example.larry.faregas.util.Constants;
import com.google.gson.Gson;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Map;

import retrofit.Call;
import retrofit.Callback;
import retrofit.Response;
import retrofit.Retrofit;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class ClientsActivity extends AppCompatActivity {

    public static final String TAG = ClientsActivity.class.getSimpleName();
    public ArrayList<Client> clients;
    public ClientsArrayAdapter adapter;
    public ProgressDialog progress;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.clients_activity);
        startService();
        setToolbar();
    }

    public void setToolbar(){
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar); // Attaching the layout to the toolbar object
        toolbar.setTitle("Clientes");

        toolbar.inflateMenu(R.menu.menu_create_client);


        toolbar.setOnMenuItemClickListener(new Toolbar.OnMenuItemClickListener() {
            @Override
            public boolean onMenuItemClick(MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.action_new_client:
                        showCreateClientDialog();
                        break;
                }
                return true;
            }
        });
    }

    public void showCreateClientDialog(){
        FragmentManager fm = getFragmentManager();
        ClientCreateDialog clientCreateDialog = new ClientCreateDialog();
        clientCreateDialog.show(fm, TAG);
    }

    public  void startService(){
        clients = new ArrayList<Client>();
        progress = ProgressDialog.show(this, "Cargando", "Cargando Clientes", true);

        RestClient.FaregasApiInterface service = RestClient.getClient();
        Call<ClientAllResponse> call =  service.getClients();
        call.enqueue(new Callback<ClientAllResponse>() {
            @Override
            public void onResponse(Response<ClientAllResponse> response, Retrofit retrofit) {
                String json = new Gson().toJson(response.body());
                Map<String, Object> jsonMap = new Gson().fromJson(json, Map.class);
                String messages = (String) jsonMap.get("message");
                if (messages.equals(Constants.SUCCESS_MESSAGE)) {
                    try {
                        JSONObject jsonObj = new JSONObject(json);

                        // Getting JSON Array node
                        JSONArray clientsJson = jsonObj.getJSONArray("clients");

                        // looping through All Contacts
                        for (int i = 0; i < clientsJson.length(); i++) {
                            JSONObject c = clientsJson.getJSONObject(i);

                            Client client = new Client();
                            client.setCodigo(c.getString("cli_cod"));
                            client.setDni(c.getString("cli_dni"));
                            client.setFoto(c.getString("cli_foto"));
                            client.setNombre(c.getString("cli_nombre"));
                            client.setPaterno(c.getString("cli_pater"));
                            client.setMaterno(c.getString("cli_mater"));
                            client.setTelefono(c.getString("cli_telf"));
                            client.setEmail(c.getString("cli_email"));
                            client.setDireccion(c.getString("cli_direccion"));
                            client.setTipoVehiculo(c.getString("cli_tipvehiculo"));
                            client.setMarca(c.getString("cli_marca"));
                            client.setModelo(c.getString("cli_model"));
                            client.setPlaca(c.getString("cli_placa"));
                            client.setFecha(c.getString("cli_fecha"));
                            clients.add(client);
                        }
                        showClients();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                } else {
                    AlertDialogUtil.showAlertDialog(ClientsActivity.this, messages);
                }
                progress.dismiss();
            }

            @Override
            public void onFailure(Throwable t) {
                AlertDialogUtil.showAlertDialog(ClientsActivity.this, "Ocurrio un problema");
                progress.dismiss();
            }
        });
    }

    public void showClients(){
        adapter = new ClientsArrayAdapter(this, clients);
        ListView listView = (ListView) findViewById(R.id.list_view_clients);
        listView.setAdapter(adapter);
    }

    public void addNewClient(Client client){
        clients.add(client);
        adapter.notifyDataSetChanged();
    }

}
