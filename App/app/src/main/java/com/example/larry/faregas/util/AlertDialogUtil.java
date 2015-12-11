package com.example.larry.faregas.util;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;

import com.example.larry.faregas.R;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class AlertDialogUtil {

    public static void showAlertDialog(final Context context,final String message){
        new AlertDialog.Builder(context).setMessage(message)
                .setPositiveButton(R.string.accept, null).show();
    }

    public static void showAlertDialogAndCloseActivity(final Activity activity,
                                                       final String message) {
        new AlertDialog.Builder(activity).setMessage(message)
                .setPositiveButton(R.string.accept, new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        activity.finish();
                    }
                }).setCancelable(false).show();
    }
}
