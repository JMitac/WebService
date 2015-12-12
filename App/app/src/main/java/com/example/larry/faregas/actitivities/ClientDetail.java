package com.example.larry.faregas.actitivities;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.example.larry.faregas.R;
import com.example.larry.faregas.models.Client;
import com.example.larry.faregas.models.Revision;
import com.example.larry.faregas.net.RestClient;
import com.example.larry.faregas.net.response.ClientAllResponse;
import com.example.larry.faregas.net.response.RevisionResponse;
import com.example.larry.faregas.util.AlertDialogUtil;
import com.example.larry.faregas.util.Constants;
import com.google.gson.Gson;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Map;

import retrofit.Call;
import retrofit.Callback;
import retrofit.Response;
import retrofit.Retrofit;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class ClientDetail extends AppCompatActivity implements View.OnClickListener {

    private TextView etNombre;
    private TextView etEmail;
    private TextView etTipoVehiculo;
    private TextView etMarca;
    private Button btRevision;
    private Client client;
    private Revision revision;
    public ProgressDialog progress;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.client_detail_activity);

        Intent intent = getIntent();
        client = (Client) intent.getSerializableExtra("client");
        initElements();
        setFields();
        setToolbar();
        startService();
    }

    public void setToolbar() {
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar); // Attaching the layout to the toolbar object
        toolbar.setTitle(client.getNombre());
    }

    private void initElements(){
        etNombre = (TextView) findViewById(R.id.et_nombre);
        etEmail = (TextView) findViewById(R.id.et_email);
        etTipoVehiculo = (TextView) findViewById(R.id.et_tipo_vehiculo);
        etMarca = (TextView) findViewById(R.id.et_marca);
        btRevision = (Button) findViewById(R.id.bt_revision);
        btRevision.setOnClickListener(this);
        btRevision.setEnabled(false);
    }

    private void setFields(){
        etNombre.setText(client.getNombre());
        etEmail.setText(client.getEmail());
        etTipoVehiculo.setText(client.getTipoVehiculo());
        etMarca.setText(client.getMarca());
    }

    private void startService(){
        progress = ProgressDialog.show(this, "Cargando", "Cargando Informacion", true);

        RestClient.FaregasApiInterface service = RestClient.getClient();
        Call<RevisionResponse> call =  service.getRevision(client.getCodigo());
        call.enqueue(new Callback<RevisionResponse>() {
            @Override
            public void onResponse(Response<RevisionResponse> response, Retrofit retrofit) {
                String json = new Gson().toJson(response.body());
                Map<String, Object> jsonMap = new Gson().fromJson(json, Map.class);
                String messages = (String) jsonMap.get("message");
                if (messages.equals(Constants.SUCCESS_MESSAGE)) {
                    try {
                        JSONObject jsonObj = new JSONObject(json);

                        // Getting JSON Array node
                        JSONObject revisionJson = jsonObj.getJSONObject("revision");

                        if (revisionJson != null) {
                            revision = new Revision();
                            revision.setCliCodigo(revisionJson.getString("cli_cod"));
                            revision.setMotor(revisionJson.getString("rev_motor"));
                            revision.setTubo(revisionJson.getString("rev_tubo"));
                            revision.setBujias(revisionJson.getString("rev_bujias"));
                            revision.setBobinas(revisionJson.getString("rev_bobinas"));
                            revision.setRadiador(revisionJson.getString("rev_radidador"));
                            revision.setMangeras(revisionJson.getString("rev_mangeras"));
                            revision.setFiltros(revisionJson.getString("rev_filtros"));
                            revision.setCheck(revisionJson.getString("rev_check"));
                            validateWithRevision();
                        }


                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                } else {
                    AlertDialogUtil.showAlertDialog(ClientDetail.this, messages);
                }
                progress.dismiss();
            }

            @Override
            public void onFailure(Throwable t) {
                AlertDialogUtil.showAlertDialog(ClientDetail.this, "Ocurrio un problema");
                progress.dismiss();
            }
        });
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.bt_revision:
                goToRevisionActivity();
                break;
        }
    }

    private void goToRevisionActivity(){
        Intent intent = new Intent(this, RevisionActivity.class);
        intent.putExtra("revision", revision);
        startActivity(intent);
    }

    private void validateWithRevision(){
        btRevision.setEnabled(true);
        btRevision.setText("Ver Detalle de revision");
    }
}
