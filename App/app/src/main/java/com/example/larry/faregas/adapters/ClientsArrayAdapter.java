package com.example.larry.faregas.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.larry.faregas.R;
import com.example.larry.faregas.models.Client;

import java.util.ArrayList;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class ClientsArrayAdapter extends ArrayAdapter<Client> {

    // View lookup cache
    private static class ViewHolder {
        TextView nombre;
        TextView email;
        TextView marca;
    }

    public ClientsArrayAdapter(Context context, ArrayList<Client> ideas) {
        super(context, R.layout.client_item, ideas);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        Client client = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        ViewHolder viewHolder; // view lookup cache stored in tag
        if (convertView == null) {
            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.client_item, parent, false);
            viewHolder.nombre = (TextView) convertView.findViewById(R.id.item_nombre);
            viewHolder.email = (TextView) convertView.findViewById(R.id.item_email);
            viewHolder.marca = (TextView) convertView.findViewById(R.id.item_marca);
            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
        }
        // Populate the data into the template view using the data object
        viewHolder.nombre.setText(client.getNombre());
        viewHolder.email.setText(client.getEmail());
        viewHolder.marca.setText(client.getMarca());
        // Return the completed view to render on screen
        return convertView;
    }
}
