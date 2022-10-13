import {createSlice, PayloadAction} from "@reduxjs/toolkit";

export interface SettingState {
    primaryColor: string,
    secondaryColor: string,
}

const initialState: SettingState = {
    primaryColor: '#fff',
    secondaryColor: '#fff',
}

const userSettingSlice = createSlice({
    name: "userSettings",
    initialState,
    reducers: {
        receivedSettings(state, action: PayloadAction<SettingState>) {
            state.primaryColor = action.payload.primaryColor;
            state.secondaryColor = action.payload.secondaryColor;
        }
    },
});

export const { receivedSettings } = userSettingSlice.actions;
export default userSettingSlice.reducer;

