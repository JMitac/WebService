package com.example.larry.faregas.actitivities;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.example.larry.faregas.R;
import com.example.larry.faregas.models.Client;

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

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.client_detail_activity);

        Intent intent = getIntent();
        client = (Client) intent.getSerializableExtra("client");
        initElements();
        setFields();
        setToolbar();
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
    }

    private void setFields(){
        etNombre.setText(client.getNombre());
        etEmail.setText(client.getEmail());
        etTipoVehiculo.setText(client.getTipoVehiculo());
        etMarca.setText(client.getMarca());
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

    }
}
