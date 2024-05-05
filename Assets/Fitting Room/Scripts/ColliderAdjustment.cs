using UnityEngine;
using UnityEngine.Serialization;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class ColliderAdjustment : MonoBehaviour
    {
        [SerializeField] private Button plusBtn;
        [SerializeField] private Button minusBtn;
    
        [SerializeField] private float deltaValue;
        
        [SerializeField] private CapsuleCollider[] capsuleColliders;
        [SerializeField] private SphereCollider[] sphereColliders;
    
        private void Start()
        {
            plusBtn.onClick.AddListener(OnPlusClick);
            minusBtn.onClick.AddListener(OnMinusClick);
        }
    
        private void OnPlusClick()
        {
            foreach (var collider in capsuleColliders)
            {
                collider.radius += deltaValue;
            }
            
            foreach (var collider in sphereColliders)
            {
                collider.radius += deltaValue;
            }
        }
    
        private void OnMinusClick()
        {
            foreach (var collider in sphereColliders)
            {
                collider.radius -= deltaValue;
            }
            
            foreach (var collider in capsuleColliders)
            {
                collider.radius -= deltaValue;
            }
        }
    }

}

