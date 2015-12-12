package com.example.larry.faregas.dialog;

import android.app.Dialog;
import android.app.DialogFragment;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.widget.Button;
import android.widget.EditText;

import com.example.larry.faregas.R;
import com.example.larry.faregas.actitivities.ClientsActivity;
import com.example.larry.faregas.models.Client;
import com.example.larry.faregas.net.RestClient;
import com.example.larry.faregas.net.request.NewClientRequest;
import com.example.larry.faregas.net.response.ClientAllResponse;
import com.example.larry.faregas.net.response.SimpleResponse;
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
public class ClientCreateDialog extends DialogFragment implements View.OnClickListener{

    private EditText etCodigo;
    private EditText etDni;
    private EditText etNombre;
    private EditText etApellidoPaterno;
    private EditText etApellidoMaterno;
    private EditText etTelefono;
    private EditText etEmail;
    private EditText etDireccion;
    private EditText etTipoVehiculo;
    private EditText etMarca;
    private EditText etModelo;
    private EditText etPlaca;
    private Button btRegister;

    public ProgressDialog progress;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.client_create_dialog, container, false);
        initElements(rootView);
        setToolbar(rootView);
        return rootView;
    }

    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Dialog dialog = super.onCreateDialog(savedInstanceState);
        dialog.getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        return dialog;
    }

    public void setToolbar(View rootView){
        Toolbar toolbar = (Toolbar) rootView.findViewById(R.id.toolbar); // Attaching the layout to the toolbar object
        toolbar.setTitle("Nuevo Cliente");

        toolbar.inflateMenu(R.menu.menu_done_dialog);


        toolbar.setOnMenuItemClickListener(new Toolbar.OnMenuItemClickListener() {
            @Override
            public boolean onMenuItemClick(MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.action_done:
                        registerUser();
                        break;
                }
                return true;
            }
        });
    }

    private void initElements(View rootView){
        etCodigo = (EditText) rootView.findViewById(R.id.et_codigo);
        etDni = (EditText) rootView.findViewById(R.id.et_dni);
        etNombre = (EditText) rootView.findViewById(R.id.et_nombre);
        etApellidoPaterno = (EditText) rootView.findViewById(R.id.et_apellido_paterno);
        etApellidoMaterno = (EditText) rootView.findViewById(R.id.et_apellido_materno);
        etTelefono = (EditText) rootView.findViewById(R.id.et_telefono);
        etEmail = (EditText) rootView.findViewById(R.id.et_email);
        etDireccion = (EditText) rootView.findViewById(R.id.et_direccion);
        etTipoVehiculo = (EditText) rootView.findViewById(R.id.et_tipo_vehiculo);
        etMarca = (EditText) rootView.findViewById(R.id.et_marca);
        etModelo = (EditText) rootView.findViewById(R.id.et_modelo);
        etPlaca = (EditText) rootView.findViewById(R.id.et_placa);
        btRegister = (Button) rootView.findViewById(R.id.btnRegister);
        btRegister.setOnClickListener(this);
    }

    private void registerUser(){
        String codigo = etCodigo.getText().toString();
        String dni = etDni.getText().toString();
        String nombre = etNombre.getText().toString();
        String apellidoPaterno = etApellidoPaterno.getText().toString();
        String apellidoMaterno = etApellidoPaterno.getText().toString();
        String telefono = etTelefono.getText().toString();
        String email = etEmail.getText().toString();
        String direccion = etDireccion.getText().toString();
        String tipoVehiculo = etTipoVehiculo.getText().toString();
        String marca = etMarca.getText().toString();
        String modelo = etModelo.getText().toString();
        String placa = etPlaca.getText().toString();
        if (validateFields()){
            progress = ProgressDialog.show(getActivity(), "Cargando", "Registrando Cliente", true);
            final NewClientRequest clientRequest = new NewClientRequest(codigo, dni, nombre, apellidoPaterno, apellidoMaterno, telefono, email, direccion, tipoVehiculo, marca, modelo, placa);
            RestClient.FaregasApiInterface service = RestClient.getClient();
            Call<SimpleResponse> call =  service.createClient(clientRequest);
            call.enqueue(new Callback<SimpleResponse>() {
                @Override
                public void onResponse(Response<SimpleResponse> response, Retrofit retrofit) {
                    String json = new Gson().toJson(response.body());
                    Map<String, Object> jsonMap = new Gson().fromJson(json, Map.class);
                    String messages = (String) jsonMap.get("message");
                    if (messages.equals(Constants.SUCCESS_MESSAGE)) {
                        Client client = clientRequest.parseToClient();
                        goToClientsActivity(client);
                    } else {
                        AlertDialogUtil.showAlertDialog(getActivity(), messages);
                    }
                    progress.dismiss();
                }

                @Override
                public void onFailure(Throwable t) {
                    AlertDialogUtil.showAlertDialog(getActivity(), "Ocurrio un problema");
                    progress.dismiss();
                }
            });
        }

    }

    private boolean validateFields(){
        //TO DO LARRY O JULIO VALIDAR QUE LOS CAMPOS NO ESTEN VACIOS
        return true;
    }

    private void goToClientsActivity(Client client){
        ((ClientsActivity) getActivity()).addNewClient(client);
        this.dismiss();
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.btnRegister:
                registerUser();
                break;
        }
    }
}
