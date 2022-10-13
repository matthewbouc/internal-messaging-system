import { createSlice} from "@reduxjs/toolkit";

export interface MessageState {
    messages: { [group: string]: string }
}

const initialState: MessageState = {
    messages: {}
}

const messageSlice = createSlice({
    name: "message",
    initialState,
    reducers: {}
});

export default messageSlice.reducer;