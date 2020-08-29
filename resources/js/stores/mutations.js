import MutationsLogin from "./mutations/MutationsLogin";
import MutationsListar from "./mutations/MutationsListar";

const mutations = {
    ...MutationsLogin,
    ...MutationsListar
}
export default mutations;

