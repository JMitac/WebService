package com.example.larry.faregas.actitivities;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.example.larry.faregas.R;
import com.example.larry.faregas.net.RestClient;
import com.example.larry.faregas.net.request.LoginRequest;
import com.example.larry.faregas.net.response.SimpleResponse;
import com.example.larry.faregas.util.AlertDialogUtil;
import com.example.larry.faregas.util.Constants;
import com.google.gson.Gson;

import java.util.Map;

import retrofit.Call;
import retrofit.Callback;
import retrofit.Response;
import retrofit.Retrofit;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class LoginActivity extends AppCompatActivity implements View.OnClickListener {

    private EditText etUserName;
    private EditText etPassword;
    private Button btLogin;
    public ProgressDialog progress;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_activity);
        etUserName = (EditText) findViewById(R.id.txtusuario);
        etPassword = (EditText) findViewById(R.id.passusuario);
        btLogin = (Button) findViewById(R.id.btnLogin);
        btLogin.setOnClickListener(this);
    }


    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.btnLogin:
                loginUser();
                break;
        }
    }

    private void loginUser(){
        String code = etUserName.getText().toString();
        String password = etPassword.getText().toString();
        progress = ProgressDialog.show(this, "Cargando", "Logeandote", true);
        LoginRequest loginRequest = new LoginRequest(code, password);
        RestClient.FaregasApiInterface service = RestClient.getClient();
        Call<SimpleResponse> call =  service.loginUser(loginRequest);
        call.enqueue(new Callback<SimpleResponse>() {
            @Override
            public void onResponse(Response<SimpleResponse> response, Retrofit retrofit) {
                String json = new Gson().toJson(response.body());
                Map<String, Object> jsonMap = new Gson().fromJson(json, Map.class);
                String messages = (String) jsonMap.get("message");
                if (messages.equals(Constants.SUCCESS_MESSAGE)){
                    goToClientsActivity();
                }else{
                    AlertDialogUtil.showAlertDialog(LoginActivity.this, messages);
                }
                progress.dismiss();
            }

            @Override
            public void onFailure(Throwable t) {
                AlertDialogUtil.showAlertDialog(LoginActivity.this, "Ocurrio un problema");
                progress.dismiss();
            }
        });
    }

    public void goToClientsActivity(){
        Intent intent = new Intent(this, ClientsActivity.class);
        startActivity(intent);
    }
}
