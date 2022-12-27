import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useClientes(){

    const clientes = ref([]);
    const cliente = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getClientes = async() => {
        const response = await axios.get("clientes");
        clientes.value = response.data.data;
    };

    const getCliente = async(id) => {
        const response = await axios.get("clientes" + id);
        cliente.value = response.data.data;
    };

    const storeCliente = async(data) => {
        try{
            await axios.post("clientes", data);
            await router.push({name: "criar"});
        }catch(error){
            if (error.respone.status === 442) {
                errors.value = error.respone.data.erros;
            }
        }
    };

    const updateCliente = async(id) => {
        try {
            await axios.put("clientes/" + id, cliente.value);
            await router.push({name: "criar"});
        } catch (error) {
            if (error.respone.status === 442) {
                errors.value = error.respone.data.erros;
            }
        }
    };

    const destroyCliente = async(id) => {
        if (!window.confirm("Você tem certeza?")) {
            return;
        }
        await axios.delete("clientes/" + id);
        await getClientes();
    };

    return {
        cliente,
        clientes,
        getCliente,
        getClientes,
        storeCliente,
        updateCliente,
        destroyCliente,
        errors,
    }
}