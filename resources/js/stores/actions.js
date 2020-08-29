import actionsLogin from "./actions/ActionsLogin";
import ActionsListar from "./actions/ActionsListar";


const actions = {
   ...actionsLogin,
   ...ActionsListar,
}
export default actions;
