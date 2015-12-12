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
import com.example.larry.faregas.models.Revision;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class RevisionActivity extends AppCompatActivity{

    private TextView etMotor;
    private TextView etTubo;
    private TextView etBujias;
    private Revision revision;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.revision_activity);
        Intent intent = getIntent();
        revision = (Revision) intent.getSerializableExtra("revision");
        initElements();
        setToolbar();
        initFields();
    }

    public void setToolbar() {
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar); // Attaching the layout to the toolbar object
        toolbar.setTitle("Revision");
    }

    private void initElements(){
        etMotor = (TextView) findViewById(R.id.et_motor);
        etTubo = (TextView) findViewById(R.id.et_tubo);
        etBujias = (TextView) findViewById(R.id.et_bujias);
    }

    private void initFields(){
        etMotor.setText(revision.getMotor());
        etTubo.setText(revision.getTubo());
        etBujias.setText(revision.getBujias());
    }


}
